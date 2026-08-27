@extends('layouts.app')
@section('title', 'Catechists — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Contact</span>
  <h1>Our Catechists</h1>
  <p>Formation in the faith, guided by our parish catechists.</p>
</section>

<section>
  <div class="wrap">
    <div class="pastor-grid">
      @forelse($catechists as $catechist)
        <div class="pastor-card">
          <div class="pastor-photo">
            @if($catechist->photo)
              <img src="{{ asset('storage/'.$catechist->photo) }}" alt="{{ $catechist->name }}">
            @else
              <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=400&auto=format&fit=crop" alt="{{ $catechist->name }}">
            @endif
          </div>
          <h4>{{ $catechist->name }}</h4>
          <p>Catechist</p>
          <div style="margin-top:10px; font-size:.85rem; color:var(--ink-soft);">
            @if($catechist->phone)
              <p><i class="fa-solid fa-phone" style="color:var(--gold); margin-right:6px;"></i><a href="tel:{{ $catechist->phone }}" style="color:var(--sanctuary);">{{ $catechist->phone }}</a></p>
            @endif
            @if($catechist->email)
              <p><i class="fa-solid fa-envelope" style="color:var(--gold); margin-right:6px;"></i><a href="mailto:{{ $catechist->email }}" style="color:var(--sanctuary);">{{ $catechist->email }}</a></p>
            @endif
          </div>
          @if($catechist->bio)
            <p style="margin-top:12px; font-size:.85rem;">{{ $catechist->bio }}</p>
          @endif
        </div>
      @empty
        <p>No catechists listed yet — check back soon.</p>
      @endforelse
    </div>
    <div style="text-align:center; margin-top:48px; max-width:600px; margin-left:auto; margin-right:auto;">
      <h3 style="margin-bottom:16px;">Need to Speak With Someone?</h3>
      <p style="color:var(--ink-soft); margin-bottom:24px;">Book a Mass intention or reach out to the parish office for further inquiries.</p>
      <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
        <a href="{{ route('mass-booking.create') }}" class="btn btn-gold">Book a Mass</a>
        <a href="{{ route('contact') }}" class="btn btn-sanctuary">Further Inquiries</a>
      </div>
    </div>
  </div>
</section>
@endsection