@extends('layouts.app')
@section('title', $zone->name . ' — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">{{ $zone->station->name ?? 'Zone' }}</span>
  <h1>{{ $zone->name }}</h1>
  @if($zone->description)
    <p>{{ $zone->description }}</p>
  @endif
</section>

@if($zone->meeting_day)
<div class="event-strip">
  <div class="wrap">
    <div>
      <span class="es-label">Zonal Meeting</span>
      <div class="es-title">{{ $zone->meeting_day }} &middot; {{ $zone->meeting_time }}</div>
      <div class="es-meta">{{ $zone->meeting_venue }}</div>
    </div>
  </div>
</div>
@endif

<section>
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">Leadership</span>
      <h2>Zonal Executives</h2>
    </div>
    <div class="pastor-grid">
      @forelse($zone->executives as $exec)
        <div class="pastor-card">
          <div class="pastor-photo">
            @if($exec->photo)
              <img src="{{ asset('storage/'.$exec->photo) }}" alt="{{ $exec->name }}">
            @else
              <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=400&auto=format&fit=crop" alt="{{ $exec->name }}">
            @endif
          </div>
          <h4>{{ $exec->name }}</h4>
          <p>{{ $exec->position }}</p>
        </div>
      @empty
        <p>No executives listed yet.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection