<?php

namespace App\Http\Controllers;

use App\Models\MassBooking;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function initiate(Request $request)
    {
        $reference = 'PARISH-' . Str::upper(Str::random(10));

        $response = Http::withToken(config('services.paystack.secret_key'))
            ->post(config('services.paystack.payment_url') . '/transaction/initialize', [
                'email' => $request->email,
                'amount' => $request->amount * 100, // Paystack uses kobo
                'reference' => $reference,
                'callback_url' => route('payment.callback'),
                'metadata' => [
                    'type' => $request->type, // 'mass_booking' or 'donation'
                    'record_id' => $request->record_id,
                ],
            ]);

        $data = $response->json();

        if ($data['status']) {
            // Save the reference against the correct record before redirecting
            if ($request->type === 'mass_booking') {
                MassBooking::find($request->record_id)->update(['payment_reference' => $reference]);
            } elseif ($request->type === 'donation') {
                Donation::find($request->record_id)->update(['payment_reference' => $reference]);
            }

            return redirect($data['data']['authorization_url']);
        }

        return redirect()->route('payment.failed');
    }

    public function callback(Request $request)
    {
        $reference = $request->query('reference');

        $response = Http::withToken(config('services.paystack.secret_key'))
            ->get(config('services.paystack.payment_url') . '/transaction/verify/' . $reference);

        $data = $response->json();

        if ($data['status'] && $data['data']['status'] === 'success') {
            $metadata = $data['data']['metadata'];

            if ($metadata['type'] === 'mass_booking') {
                MassBooking::where('payment_reference', $reference)
                    ->update(['payment_status' => 'paid']);
            } elseif ($metadata['type'] === 'donation') {
                $donation = Donation::where('payment_reference', $reference)->first();
                if ($donation) {
                    $donation->update(['payment_status' => 'paid']);
                    $donation->project->increment('amount_raised', $donation->amount);
                }
            }

            return redirect()->route('payment.success');
        }

        return redirect()->route('payment.failed');
    }
}