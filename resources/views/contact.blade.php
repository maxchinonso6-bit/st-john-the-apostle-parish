@extends('layouts.app')
@section('title', 'Contact — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Get In Touch</span>
  <h1>Contact the Parish Office</h1>
  <p>We'd love to hear from you.</p>
</section>

<section>
  <div class="wrap" style="max-width:560px;">
    <div class="card">
      <div class="card-body">
        <h4>Parish Address</h4>
        <p style="white-space:pre-line;">{{ $parishAddress ?? 'St John the Apostle Parish, Isiakpu Nsukka, Nsukka Diocese' }}</p>

        @if($officePhone)
          <h4 style="margin-top:20px;">Phone</h4>
          <p>{{ $officePhone }}</p>
        @endif

        <h4 style="margin-top:20px;">Email</h4>
        <p>{{ $officeEmail ?? 'Not yet set — add it in Parish Settings.' }}</p>

        <h4 style="margin-top:20px;">Office Hours</h4>
        <p>{{ $officeHours ?? 'Not yet set — add it in Parish Settings.' }}</p>

        <h4 style="margin-top:20px;">Mass Times</h4>
        <p><a href="{{ route('mass-schedule') }}" style="color:var(--sanctuary); font-weight:600;">View Full Mass Schedule &rarr;</a></p>
      </div>
    </div>
    <div class="card" style="margin-top:24px;">
    <div style="height:320px;">
        <iframe
        src="https://www.google.com/maps?q={{ urlencode($mapQuery) }}&output=embed"
        width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy">
        </iframe>
    </div>
    <div class="card-body" style="text-align:center;">
        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($mapQuery) }}" target="_blank" class="btn btn-gold">Get Directions &rarr;</a>
    </div>
    </div>
  </div>
</section>
@endsection