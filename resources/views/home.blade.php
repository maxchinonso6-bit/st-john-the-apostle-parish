@extends('layouts.app')
@section('title', 'St John the Apostle Parish')

@section('content')

<section class="hero-photo">
<h1>Find Peace in Faith</h1>
<p style="font-family:'Playfair Display', serif; font-style:italic; font-size:1.15rem; color:var(--gold-light); margin-top:8px;">{{ $parishMotto }}</p>
<p>{{ $welcomeMessage }}</p>
  <div style="margin-top:26px; display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
    <a href="{{ route('mass-schedule') }}" class="btn btn-gold">Join Us Now</a>
    <a href="{{ route('reflections') }}" class="btn btn-outline">This Week's Reflection</a>
  </div>
</section>

@if($upcomingActivity)
<div class="event-strip">
  <div class="wrap">
    <div>
      <span class="es-label">Upcoming Activity</span>
      <div class="es-title">{{ $upcomingActivity->title }}</div>
      <div class="es-meta">{{ $upcomingActivity->organisation->name ?? '' }} &middot; {{ \Carbon\Carbon::parse($upcomingActivity->date)->format('l, F j, Y') }}</div>
    </div>
    <div class="es-countdown">
      <div><strong>{{ \Carbon\Carbon::now()->diffInDays($upcomingActivity->date, false) }}</strong><span>Days</span></div>
    </div>
    <a href="{{ route('activities') }}" class="es-link">All Activities &rarr;</a>
  </div>
</div>
@endif

<section style="background:var(--cream);">
  <div class="wrap">
    <div class="split-section">
      <div class="split-photos">
        <img src="{{asset('images/20260815_124447.jpg')}}" alt="Parish office">
        <img src="{{asset('images/20260815_124545.jpg')}}" alt="Congregation">
      </div>
      <div class="split-copy">
        <span class="eyebrow">About Us</span>
        <h2>A Community of Faith, Unity, and Love</h2>
        <p>At St John the Apostle Parish, we welcome everyone to experience God's love and grow in faith. Join us in worship, community support, and service as we walk the spiritual journey together.</p>
        <ul class="split-list">
          <li>Warm, welcoming parish family</li>
          <li>Active zones, stations, and pious organisations</li>
          <li>A parish school forming young minds in faith</li>
          <li>Opportunities to serve and grow in leadership</li>
        </ul>
        <a href="{{ route('about') }}" class="btn btn-sanctuary">About Us</a>
      </div>
    </div>
  </div>
</section>

<section style="background:var(--ivory-dim);">
  <div class="wrap">
    <div class="section-head" style="margin:0 auto 40px; text-align:center; max-width:600px;">
      <span class="eyebrow">Reflect and Grow</span>
      <h2>Weekly Reflection</h2>
      <p>A word for the week, shared by our parish priest, Rev. Fr. Bernard Uche Ugwueze.</p>

    @if($latestReflection)
      <div class="card" style="max-width:760px; margin:0 auto; display:grid; grid-template-columns:240px 1fr;">
        <div style="height:100%; min-height:200px;">
        @if($latestReflection->photo)
            <img src="{{ asset('storage/'.$latestReflection->photo) }}" alt="{{ $latestReflection->title }}">
        @else
            <div class="no-photo"><i class="fa-solid fa-book-open"></i></div>
        @endif
        </div>
        <div class="card-body">
          <h4>{{ $latestReflection->title }}</h4>
          <p>{{ $latestReflection->excerpt }}</p>
          @if($latestReflection->facebook_url)
            <a href="{{ $latestReflection->facebook_url }}" target="_blank" class="btn btn-gold" style="margin-top:14px;">Read on Facebook &rarr;</a>
          @endif
        </div>
      </div>
    @else
      <p style="text-align:center;">No reflection posted yet — check back soon.</p>
    @endif
  </div>
</section>
  <section style="position:relative; background:
    linear-gradient(180deg, rgba(59,42,28,.75) 0%, rgba(45,32,21,.9) 100%),
    url('/images/ChatGPT Image Aug 22, 2026, 05_27_35 AM.png');
    background-size:cover; background-position:center; color:var(--cream);
    padding:90px 0; min-height:500px; display:flex; align-items:center;">
  <div class="wrap">
    <div class="section-head" style="margin:0 auto 40px; text-align:center; max-width:600px;">
      <span class="eyebrow" style="color:var(--gold-light);">Worship With Us</span>
      <h2 style="color:var(--cream);">Sunday Mass Schedule</h2>
    </div>
    <div class="schedule-grid">
    @forelse($massSchedules as $schedule)
    <div class="card schedule-card">
        <div class="card-body">
            <h4>{{ $schedule->day }}</h4>
            <p style="color:var(--wine); font-weight:600;">{{ $schedule->time }}</p>
            @if($schedule->location)
              <p style="font-size:.85rem; color:var(--ink-soft);">{{ $schedule->location }}</p>
            @endif
          </div>
        </div>
      @empty
        <p style="color:var(--ivory-dim);">Mass schedule coming soon.</p>
      @endforelse
    </div>
  </div>
</section>
{{-- ===== SCHOOL ACTIVITIES HIGHLIGHT ===== --}}
@if($schoolActivities->count())
<section style="background:var(--ivory-dim);">
  <div class="wrap">
    <div class="section-head" style="margin:0 auto 40px; text-align:center; max-width:600px;">
      <span class="eyebrow">St John the Apostle Nursery and primary School</span>
      <h2>School Activities</h2>
      <p>Forming young minds in faith and academic excellence.</p>
    </div>
    <div class="card-grid">
      @foreach($schoolActivities as $activity)
        <div class="card">
          <div class="card-photo">
            @if($activity->photo)
              <img src="{{ asset('storage/'.$activity->photo) }}" alt="{{ $activity->title }}">
            @else
              <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=700&auto=format&fit=crop" alt="{{ $activity->title }}">
            @endif
          </div>
          <div class="card-body">
            <h4>{{ $activity->title }}</h4>
            @if($activity->recurrence)
            <p style="color:var(--wine); font-weight:600; font-size:.85rem;">{{ $activity->recurrence }}</p>
            @elseif($activity->date)
            <p style="color:var(--wine); font-weight:600; font-size:.85rem;">{{ \Carbon\Carbon::parse($activity->date)->format('F j, Y') }}</p>
            @endif
            @if($activity->description)
              <p>{{ \Illuminate\Support\Str::limit($activity->description, 90) }}</p>
            @endif
          </div>
        </div>
      @endforeach
    </div>
    <div style="text-align:center; margin-top:32px;">
      <a href="{{ route('school') }}" class="btn btn-sanctuary">View All School Activities</a>
    </div>
  </div>
</section>
@endif
@if($activeClergy->count())
<section style="background:var(--cream);">
  <div class="wrap">
    <div class="section-head" style="margin:0 auto 40px; text-align:center; max-width:600px;">
      <span class="eyebrow">Our Shepherds</span>
      <h2>Meet Our Priests</h2>
      <p>Guiding our community in faith and love.</p>
    </div>
    <div class="pastor-grid">
      @foreach($activeClergy as $priest)
        <div class="pastor-card">
          <div class="pastor-photo">
            @if($priest->photo)
              <img src="{{ asset('storage/'.$priest->photo) }}" alt="{{ $priest->name }}">
            @else
              <div class="no-photo"><i class="fa-solid fa-user"></i></div>
            @endif
          </div>
          <h4>{{ $priest->name }}</h4>
          <p>{{ $priest->role }}</p>
        </div>
      @endforeach
    </div>
    <div style="text-align:center; margin-top:32px;">
      <a href="{{ route('about') }}" class="btn btn-sanctuary">Meet Our Full Team</a>
    </div>
  </div>
</section>
@endif
@endsection