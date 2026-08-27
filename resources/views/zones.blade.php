@extends('layouts.app')
@section('title', 'Zones & Stations — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Parish Life</span>
  <h1>Zones &amp; Stations</h1>
  <p>Our parish is organised into stations, each made up of local zones.</p>
</section>

<section>
  <div class="wrap">
    @foreach($stations as $station)
      <div class="section-head">
        <span class="eyebrow">Station</span>
        <h2>{{ $station->name }}</h2>
        @if($station->description)
          <p>{{ $station->description }}</p>
        @endif
      </div>
      <div class="directory-grid" style="margin-bottom:48px;">
        @forelse($station->zones as $zone)
          <div class="directory-card">
            <div class="directory-thumb"></div>
            <div class="directory-body">
              <h4>{{ $zone->name }}</h4>
              <ul class="directory-meta">
                @if($zone->meeting_day)
                  <li>Meets {{ $zone->meeting_day }} &middot; {{ $zone->meeting_time }}</li>
                @endif
                @if($zone->meeting_venue)
                  <li>{{ $zone->meeting_venue }}</li>
                @endif
              </ul>
              <div class="directory-actions">
                <a href="{{ route('zones.show', $zone) }}">View Zone &rarr;</a>
              </div>
            </div>
          </div>
        @empty
          <p>No zones added yet for this station.</p>
        @endforelse
      </div>
    @endforeach
  </div>
</section>
@endsection