@extends('layouts.app')
@section('title', 'Parish Gallery — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Parish Life</span>
  <h1>Photos &amp; Videos</h1>
  <p>Moments from parish life — including our Parish Priest's Silver Jubilee celebration.</p>
</section>

<section>
  <div class="wrap">
    <div class="card-grid">
      @forelse($albums as $album)
        <a href="{{ route('gallery.show', $album) }}" class="card" style="display:block;">
          <div class="card-photo">
            @if($album->cover_type === 'photo' && $album->cover_image)
              <img src="{{ asset('storage/'.$album->cover_image) }}" alt="{{ $album->title }}">
            @else
              <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; background:linear-gradient(160deg,var(--sanctuary-deep),var(--sanctuary)); color:var(--cream); font-size:2rem;">&#9658;</div>
            @endif
          </div>
          <div class="card-body">
            <h4>{{ $album->title }}</h4>
            @if($album->event_date)
              <p style="color:var(--wine); font-weight:600; font-size:.85rem;">{{ \Carbon\Carbon::parse($album->event_date)->format('F Y') }}</p>
            @endif
            <p>{{ $album->items_count ?? $album->items()->count() }} items &middot; View Album &rarr;</p>
          </div>
        </a>
      @empty
        <p>No albums posted yet — check back soon.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection