@extends('layouts.app')
@section('title', 'Book a Mass — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Give</span>
  <h1>Book a Mass Intention</h1>
  <p>Transfer your Mass offering, upload proof of payment, and we'll confirm your booking.</p>
</section>

<section>
  <div class="wrap" style="max-width:640px;">

    @if(session('success'))
      <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if($bankDetails['account_number'])
      <div class="bank-box">
        <h4>Parish Account Details</h4>
        <p><strong>Bank:</strong> {{ $bankDetails['bank_name'] }}</p>
        <p><strong>Account Name:</strong> {{ $bankDetails['account_name'] }}</p>
        <p><strong>Account Number:</strong> {{ $bankDetails['account_number'] }}</p>
      </div>
    @endif

    <form class="parish-form" method="POST" action="{{ route('mass-booking.store') }}" enctype="multipart/form-data" style="max-width:100%;">
      @csrf
      <label>Your Full Name</label>
      <input type="text" name="booker_name" required value="{{ old('booker_name') }}">

      <label>Phone Number</label>
      <input type="text" name="phone" required value="{{ old('phone') }}">

      <label>Email (optional)</label>
      <input type="email" name="email" value="{{ old('email') }}">

      <label>Intention Type</label>
      <select name="intention_type" required>
        <option value="">-- Select --</option>
        <option value="thanksgiving">Thanksgiving</option>
        <option value="sick">For the Sick</option>
        <option value="rip">Repose of the Soul (RIP)</option>
        <option value="birthday">Birthday</option>
        <option value="other">Other</option>
      </select>

      <label>Intention Details</label>
      <textarea name="intention_text" rows="3" placeholder="e.g. For the repose of the soul of..."></textarea>

      <label>Preferred Mass Date</label>
      <input type="date" name="mass_date" required>

      <label>Amount (₦)</label>
      <input type="number" name="amount" step="0.01" required>

      <label>Proof of Payment (screenshot/receipt)</label>
      <input type="file" name="proof_of_payment" accept="image/*" required>

      <button type="submit" class="btn btn-gold">Submit Booking</button>
    </form>
  </div>
</section>
@endsection