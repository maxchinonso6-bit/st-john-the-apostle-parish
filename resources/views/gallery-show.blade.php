@extends('layouts.app')
@section('title', $album->title . 'St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Gallery</span>
  <h1>{{ $album->title }}</h1>
  @if($album->description)<p>{{ $album->description }}</p>@endif
</section>

<section>
  <div class="wrap">
    <div class="card-grid">
      @foreach($album->items as $item)
        <div class="card">
          <div class="card-photo" style="height:200px;">
            @if($item->type === 'photo')
              <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->caption }}">
            @else
              @php
                $embedUrl = str_contains($item->video_url, 'youtube.com') || str_contains($item->video_url, 'youtu.be')
                  ? str_replace(['watch?v=', 'youtu.be/'], ['embed/', 'youtube.com/embed/'], $item->video_url)
                  : null;
              @endphp
              @if($embedUrl)
                <iframe src="{{ $embedUrl }}" width="100%" height="100%" style="border:0;" allowfullscreen></iframe>
              @else
                <a href="{{ $item->video_url }}" target="_blank" style="display:flex; align-items:center; justify-content:center; height:100%; background:linear-gradient(160deg,var(--sanctuary-deep),var(--sanctuary)); color:var(--cream);">Watch Video &rarr;</a>
              @endif
            @endif
          </div>
          @if($item->caption)
            <div class="card-body"><p>{{ $item->caption }}</p></div>
          @endif
        </div>
      @endforeach
    </div>
    <div style="text-align:center; margin-top:32px;">
      <a href="{{ route('gallery') }}" class="btn btn-sanctuary">&larr; Back to Gallery</a>
    </div>
  </div>
</section>
@endsection