<?php

namespace App\Http\Controllers;

use App\Models\DonationProject;
use App\Models\Donation;
use App\Models\Setting;
use App\Mail\NewPaymentSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DonationController extends Controller
{
    public function index()
    {
        $ongoingProjectAlbum = \App\Models\GalleryAlbum::where('title', 'Ongoing Building Projects')->with('items')->first();
        $projects = DonationProject::orderBy('category')->orderBy('title')->get()->groupBy('category');
        return view('donations', compact('projects', 'ongoingProjectAlbum'));
    }
    public function show(DonationProject $donationProject)
    {
        $bankDetails = [
            'bank_name' => Setting::where('key', 'bank_name')->value('value'),
            'account_name' => Setting::where('key', 'account_name')->value('value'),
            'account_number' => Setting::where('key', 'account_number')->value('value'),
        ];

        return view('donations.show', ['project' => $donationProject, 'bankDetails' => $bankDetails]);
    }

    public function store(Request $request, DonationProject $donationProject)
    {
        $validated = $request->validate([
            'donor_name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'amount' => 'required|numeric|min:0',
            'proof_of_payment' => 'required|image|max:5120',
        ]);

        if ($request->hasFile('proof_of_payment')) {
            $validated['proof_of_payment'] = $request->file('proof_of_payment')
                ->store('proof-of-payment', 'public');
        }

        $validated['payment_status'] = 'pending';
        $validated['donation_project_id'] = $donationProject->id;

        $donation = Donation::create($validated);

        $officeEmail = Setting::where('key', 'parish_office_email')->value('value');
        if ($officeEmail) {
            Mail::to($officeEmail)->send(new NewPaymentSubmission('donation', $donation));
        }

        return redirect()->route('donations.show', $donationProject)
            ->with('success', 'Thank you for your generosity! Your donation is pending confirmation.');
    }
}