@extends('layouts.app')
@section('title', $organisation->name . ' — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">{{ $organisation->type === 'pious' ? 'Pious Organisation' : 'Parish Activity' }}</span>
    <h1>{{ $organisation->name }}</h1>
    <p>{{ $organisation->mission }}</p>
    @if($organisation->slogan)
      <p style="font-style:italic; color:var(--gold-light); margin-top:8px;">"{{ $organisation->slogan }}"</p>
    @endif
</section>

@if($organisation->meeting_day)
<div class="event-strip">
  <div class="wrap">
    <div>
      <span class="es-label">Meets</span>
      <div class="es-title">{{ $organisation->meeting_day }} &middot; {{ $organisation->meeting_time }}</div>
      <div class="es-meta">{{ $organisation->meeting_venue }}</div>
    </div>
  </div>
</div>
@endif

<section>
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">Activities</span>
      <h2>Recent &amp; Upcoming</h2>
    </div>
    <div class="card-grid">
      @forelse($organisation->activities as $activity)
        <div class="card">
          <div class="card-photo">
            @if($activity->photo)
              <img src="{{ asset('storage/'.$activity->photo) }}" alt="{{ $activity->title }}">
            @else
              <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=700&auto=format&fit=crop" alt="{{ $activity->title }}">
            @endif
          </div>
          <div class="card-body">
            <h4>{{ $activity->title }}</h4>
                @if($activity->recurrence)
                  <p style="color:var(--wine); font-weight:600; font-size:.85rem;">{{ $activity->recurrence }}</p>
                @elseif($activity->date)
                  <p style="color:var(--wine); font-weight:600; font-size:.85rem;">{{ \Carbon\Carbon::parse($activity->date)->format('F j, Y') }}</p>
                @endif
            <p>{{ $activity->description }}</p>
          </div>
        </div>
      @empty
        <p>No activities posted yet — check back soon.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection