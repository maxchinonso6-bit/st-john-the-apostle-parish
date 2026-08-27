<?php

namespace App\Http\Controllers;

use App\Models\MassBooking;
use App\Models\Setting;
use App\Mail\NewPaymentSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MassBookingController extends Controller
{
    public function create()
    {
        $bankDetails = [
            'bank_name' => Setting::where('key', 'bank_name')->value('value'),
            'account_name' => Setting::where('key', 'account_name')->value('value'),
            'account_number' => Setting::where('key', 'account_number')->value('value'),
        ];

        return view('mass-booking', compact('bankDetails'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booker_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'intention_type' => 'required|string',
            'intention_text' => 'nullable|string',
            'mass_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'proof_of_payment' => 'required|image|max:5120',
        ]);

        if ($request->hasFile('proof_of_payment')) {
            $validated['proof_of_payment'] = $request->file('proof_of_payment')
                ->store('proof-of-payment', 'public');
        }

        $validated['payment_status'] = 'pending';

        $booking = MassBooking::create($validated);

        $officeEmail = Setting::where('key', 'parish_office_email')->value('value');
        if ($officeEmail) {
            Mail::to($officeEmail)->send(new NewPaymentSubmission('mass_booking', $booking));
        }

        return redirect()->route('mass-booking.create')
            ->with('success', 'Your Mass booking has been submitted. The parish office will confirm shortly.');
    }
}