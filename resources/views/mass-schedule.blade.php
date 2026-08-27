@extends('layouts.app')
@section('title', 'Mass & Activities Schedule — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Worship With Us</span>
  <h1>Mass &amp; Activities Schedule</h1>
  <p>Mass times, confessions, catechism, and pastoral care across the parish.</p>
</section>

<section>
  <div class="wrap">
    @forelse($schedules as $category => $items)
    <div class="section-head" style="text-align:center; margin:0 auto 32px; max-width:600px;">
        <h2>{{ $category }}</h2>
    </div>
      <div class="schedule-grid" style="margin-bottom:48px;">
        @foreach($items as $item)
        <div class="card schedule-card">
            <div class="card-body">
                <h4>{{ $item->day }}</h4>
              <p style="color:var(--wine); font-weight:600; font-size:1.05rem;">{{ $item->time }}</p>
              @if($item->location)
                <p style="font-size:.85rem;">{{ $item->location }}</p>
              @endif
              @if($item->notes)
                <p style="font-size:.82rem; color:var(--ink-soft);">{{ $item->notes }}</p>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @empty
      <p>Schedule coming soon.</p>
    @endforelse

    <div style="text-align:center; margin-top:12px;">
      <a href="{{ route('mass-booking.create') }}" class="btn btn-sanctuary">Book a Mass Intention</a>
    </div>
  </div>
</section>
@endsection