@extends('layouts.app')
@section('title', 'About Us — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Our Story</span>
  <h1>About Our Parish</h1>
  <p>St John the Apostle Parish, Isiakpu Nsukka, Nsukka Diocese — a community rooted in faith and history.</p>
</section>

<section>
  <div class="wrap">
    <div style="width:100%; margin-bottom:40px;">
    <div style="text-align:center; margin-bottom:20px;">
        <span class="eyebrow">History</span>
        <h2>Our Journey of Faith</h2>
    </div>
    <p style="white-space:pre-line; text-align:justify; line-height:1.8;">{{ $parishHistory }}</p>
    </div>
  </div>
</section>

@if($activeClergy->count())
<section style="background:var(--ivory-dim);">
  <div class="wrap">
    <div class="section-head" style="margin:0 auto 40px; text-align:center; max-width:600px;">
      <span class="eyebrow">Our Shepherds</span>
      <h2>Active Priests</h2>
    </div>
    <div class="pastor-grid">
      @foreach($activeClergy as $priest)
        <div class="pastor-card">
          <div class="pastor-photo">
              <img src="{{ asset('storage/'.$priest->photo) }}" alt="{{ $priest->name }}">
          </div>
          <h4>{{ $priest->name }}</h4>
          <p>{{ $priest->role }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@if($council->count())
<section>
  <div class="wrap">
    <div class="section-head" style="margin:0 auto 40px; text-align:center; max-width:600px;">
      <span class="eyebrow">Parish Leadership</span>
      <h2>Parish Council Executives</h2>
    </div>
    <div class="pastor-grid">
      @foreach($council as $exec)
        <div class="pastor-card">
          <div class="pastor-photo">
              <img src="{{ asset('storage/'.$exec->photo) }}" alt="{{ $exec->name }}">
          </div>
          <h4>{{ $exec->name }}</h4>
          <p>{{ $exec->position }}</p>
          @if($exec->phone)
            <p style="margin-top:6px; font-size:.85rem;"><i class="fa-solid fa-phone" style="color:var(--gold); margin-right:6px;"></i><a href="tel:{{ $exec->phone }}" style="color:var(--sanctuary);">{{ $exec->phone }}</a></p>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@if($pastClergy->count())
<section style="background:var(--ivory-dim);">
  <div class="wrap">
    <div class="section-head" style="margin:0 auto 40px; text-align:center; max-width:600px;">
      <span class="eyebrow">In Remembrance</span>
      <h2>Past Priests</h2>
    </div>
    <div class="directory-grid">
      @foreach($pastClergy as $priest)
        <div class="directory-card">
          <div class="directory-thumb">
            @if($priest->photo)
              <img src="{{ asset('storage/'.$priest->photo) }}" alt="{{ $priest->name }}">
            @endif
          </div>
          <div class="directory-body">
            <h4>{{ $priest->name }}</h4>
            <ul class="directory-meta">
              <li>{{ $priest->role }}</li>
              <li>{{ $priest->start_year }} – {{ $priest->end_year ?? 'Present' }}</li>
            </ul>
            @if($priest->bio)
              <p style="font-size:.85rem; color:var(--ink-soft);">{{ $priest->bio }}</p>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection