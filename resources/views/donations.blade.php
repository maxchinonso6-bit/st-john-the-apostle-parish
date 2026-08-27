@extends('layouts.app')
@section('title', 'Support a Project — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Give</span>
  <h1>Support a Project</h1>
  <p>Your generosity helps sustain our parish, school, and community projects.</p>
</section>

@if($ongoingProjectAlbum && $ongoingProjectAlbum->items->count())
<section style="background:var(--ivory-dim);">
  <div class="wrap">
    <div class="section-head" style="text-align:center; margin:0 auto 32px; max-width:700px;">
      <span class="eyebrow">Present Needs</span>
      <h2>Ongoing Building Projects</h2>
      <p>A look at what's currently underway around the parish.</p>
    </div>
    <div class="card-grid">
      @foreach($ongoingProjectAlbum->items->where('type', 'photo') as $item)
        <div class="card">
          <div class="card-photo">
            <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->caption }}">
          </div>
          @if($item->caption)
            <div class="card-body"><p>{{ $item->caption }}</p></div>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<section>
  <div class="wrap">
    @forelse($projects as $category => $items)
      <div class="section-head" style="text-align:center; margin:0 auto 32px; max-width:700px;">
        <h2>{{ $category ?? 'Other Projects' }}</h2>
      </div>
      <div class="card-grid" style="margin-bottom:56px;">
        @foreach($items as $project)
          @php
            $title = strtolower($project->title);
            $defaultImage = match(true) {
              str_contains($title, 'paint') => 'https://images.unsplash.com/photo-1675191863404-e1db618d6655?q=80&w=1200&auto=format&fit=crop',
              str_contains($title, 'til') => 'https://images.unsplash.com/photo-1580398562556-d33329a0f29b?q=80&w=1200&auto=format&fit=crop',
              str_contains($title, 'bulb') || str_contains($title, 'fan') || str_contains($title, 'electronic') => 'https://images.unsplash.com/photo-1742327760268-78056abc4314?q=80&w=1200&auto=format&fit=crop',
              str_contains($title, 'pew') => 'https://images.unsplash.com/photo-1642150607290-2c7195c98ce1?q=80&w=1200&auto=format&fit=crop',
              str_contains($title, 'sacred') => 'https://images.unsplash.com/photo-1559913559-8cc82c1a505c?q=80&w=1200&auto=format&fit=crop',
              str_contains($title, 'altar') => 'https://images.unsplash.com/photo-1568797732023-0212d2c045b0?q=80&w=1200&auto=format&fit=crop',
              str_contains($title, 'school') || str_contains($title, 'computer') => 'https://images.unsplash.com/photo-1473649085228-583485e6e4d7?q=80&w=1200&auto=format&fit=crop',
              str_contains($title, 'musical') || str_contains($title, 'instrument') => 'https://images.unsplash.com/photo-1445375011782-2384686778a0?q=80&w=1200&auto=format&fit=crop',
              default => null,
            };
            $zoomClass = match(true) {
                str_contains($title, 'pew') => 'zoom-pews',
                str_contains($title, 'altar') => 'zoom-altar',
                str_contains($title, 'sacred') => 'zoom-sacred',
                str_contains($title, 'musical') || str_contains($title, 'instrument') => 'zoom-instrument',
                default => '',
};
@endphp
          <div class="card">
            <div class="card-photo">
              @if($project->photo)
                <img src="{{ asset('storage/'.$project->photo) }}" alt="{{ $project->title }}" class="{{ $zoomClass }}">
              @elseif($defaultImage)
                <img src="{{ $defaultImage }}" alt="{{ $project->title }}" class="{{ $zoomClass }}">
              @else
                <div class="no-photo"><i class="fa-solid fa-hand-holding-heart"></i></div>
              @endif
            </div>
            <div class="card-body">
              <h4>{{ $project->title }}</h4>
              <p>{{ \Illuminate\Support\Str::limit($project->description, 90) }}</p>
              <a href="{{ route('donations.show', $project) }}" class="btn btn-gold" style="margin-top:14px;">Donate Now</a>
            </div>
          </div>
        @endforeach
      </div>
    @empty
      <p style="text-align:center;">No projects posted yet — check back soon.</p>
    @endforelse
  </div>
</section>
@endsection