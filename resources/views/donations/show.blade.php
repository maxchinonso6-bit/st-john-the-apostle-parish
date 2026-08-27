@extends('layouts.app')
@section('title', $project->title . ' — St John the Apostle Parish')

@section('content')
@php
  $title = strtolower($project->title);
  $defaultImage = match(true) {
    str_contains($title, 'paint') => 'https://images.unsplash.com/photo-1675191863404-e1db618d6655?q=80&w=1200&auto=format&fit=crop',
    str_contains($title, 'til') => 'https://images.unsplash.com/photo-1580398562556-d33329a0f29b?q=80&w=1200&auto=format&fit=crop',
    str_contains($title, 'bulb') || str_contains($title, 'fan') || str_contains($title, 'electronic') => 'https://images.unsplash.com/photo-1742327760268-78056abc4314?q=80&w=1200&auto=format&fit=crop',
    str_contains($title, 'pew') => 'https://images.unsplash.com/photo-1642150607290-2c7195c98ce1?q=80&w=1200&auto=format&fit=crop',
    str_contains($title, 'sacred') => 'https://images.unsplash.com/photo-1559913559-8cc82c1a505c?q=80&w=1200&auto=format&fit=crop',
    str_contains($title, 'altar') => 'https://images.unsplash.com/photo-1568797732023-0212d2c045b0?q=80&w=1200&auto=format&fit=crop',
    str_contains($title, 'school') || str_contains($title, 'computer') => 'https://images.unsplash.com/photo-1473649085228-583485e6e4d7?q=80&w=1200&auto=format&fit=crop',
    str_contains($title, 'musical') || str_contains($title, 'instrument') => 'https://images.unsplash.com/photo-1445375011782-2384686778a0?q=80&w=1200&auto=format&fit=crop',
    default => null,
  };

  $zoomClass = (str_contains($title, 'pew') || str_contains($title, 'altar') || str_contains($title, 'sacred') || str_contains($title, 'musical') || str_contains($title, 'instrument'))
    ? 'zoom-in'
    : '';
@endphp

<section class="page-hero" style="padding:0; position:relative; overflow:hidden;">
  <div style="height:320px; position:relative;">
      @if($project->photo)
        <img src="{{ asset('storage/'.$project->photo) }}" alt="{{ $project->title }}" class="{{ $zoomClass }}">
      @elseif($defaultImage)
        <img src="{{ $defaultImage }}" alt="{{ $project->title }}" class="{{ $zoomClass }}">
      @else
        <div class="no-photo"><i class="fa-solid fa-hand-holding-heart"></i></div>
      @endif
    <div style="position:absolute; inset:0; background:linear-gradient(180deg, rgba(31,21,14,.3) 0%, rgba(20,13,8,.85) 100%); display:flex; flex-direction:column; justify-content:flex-end; padding:32px;">
      <span class="eyebrow" style="color:var(--gold-light);">Major Parish Projects</span>
      <h1 style="color:var(--cream);">{{ $project->title }}</h1>
    </div>
  </div>
</section>

<section>
  <div class="wrap" style="max-width:640px;">

    @if($project->description)
      <p style="margin-bottom:28px; color:var(--ink-soft);">{{ $project->description }}</p>
    @endif

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

    <form class="parish-form" method="POST" action="{{ route('donations.store', $project) }}" enctype="multipart/form-data" style="max-width:100%;">
      @csrf
      <label>Your Name (leave blank to give anonymously)</label>
      <input type="text" name="donor_name" value="{{ old('donor_name') }}">

      <label>Email (optional)</label>
      <input type="email" name="email" value="{{ old('email') }}">

      <label>Amount (₦)</label>
      <input type="number" name="amount" step="0.01" required>

      <label>Proof of Payment (screenshot/receipt)</label>
      <input type="file" name="proof_of_payment" accept="image/*" required>

      <button type="submit" class="btn btn-gold">Submit Donation</button>
    </form>

    <div style="text-align:center; margin-top:24px;">
      <a href="{{ route('donations') }}" style="color:var(--sanctuary); font-weight:600; font-size:.9rem;">&larr; Back to All Projects</a>
    </div>
  </div>
</section>
@endsection