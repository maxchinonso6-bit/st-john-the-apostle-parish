@extends('layouts.app')
@section('title', 'Buildings — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Our Grounds</span>
  <h1>Buildings &amp; Facilities</h1>
  <p>From the main church to other places, each space plays a part in the life of our community.</p>
</section>

<section>
  <div class="wrap">
    <div class="directory-grid">
      @foreach($buildings as $building)
        <div class="directory-card">
          <div class="directory-thumb">
            @if($building->photo)
              <img src="{{ asset('storage/'.$building->photo) }}" alt="{{ $building->name }}">
            @else
              <img src="https://images.unsplash.com/photo-1560624052-449f5ddf0c31?q=80&w=300&auto=format&fit=crop" alt="{{ $building->name }}">
            @endif
          </div>
          <div class="directory-body">
            <h4>{{ $building->name }}</h4>
            <p style="font-size:.88rem; color:var(--ink-soft);">{{ $building->description }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection