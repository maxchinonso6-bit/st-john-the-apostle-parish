@extends('layouts.app')
@section('title', 'Weekly Reflections — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Reflect and Grow</span>
  <h1>Weekly Reflections</h1>
  <p>Shared by our parish priest, Rev. Fr. Bernard Uche Ugwueze.</p>
</section>

<section>
  <div class="wrap">
    @forelse($reflections as $reflection)
      <div class="card" style="max-width:760px; margin:0 auto 24px; display:grid; grid-template-columns:200px 1fr;">
            <div style="height:100%; min-height:180px;">
            @if($reflection->photo)
                <img src="{{ asset('storage/'.$reflection->photo) }}" alt="{{ $reflection->title }}">
            @else
                <div class="no-photo"><i class="fa-solid fa-book-open"></i></div>
            @endif
            </div>
        <div class="card-body">
          <span style="font-size:.8rem; color:var(--wine); font-weight:600;">{{ \Carbon\Carbon::parse($reflection->published_at)->format('F j, Y') }}</span>
          <h4>{{ $reflection->title }}</h4>
          <p>{{ $reflection->excerpt }}</p>
          @if($reflection->facebook_url)
            <a href="{{ $reflection->facebook_url }}" target="_blank" class="btn btn-gold" style="margin-top:12px;">Read on Facebook &rarr;</a>
          @endif
        </div>
      </div>
    @empty
      <p style="text-align:center;">No reflections posted yet — check back soon.</p>
    @endforelse
  </div>
</section>
@endsection