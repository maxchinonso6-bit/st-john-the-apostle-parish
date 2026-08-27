@extends('layouts.app')
@section('title', 'Parish Activities — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">Parish Life</span>
  <h1>Parish Activities</h1>
  <p>CMO, CWO, CYON, and HCA — every parishioner has a place here.</p>
</section>

<section>
  <div class="wrap">
    <div class="card-grid">
      @foreach($organisations as $org)
        <div class="card">
          <div class="card-photo-portrait">
              @if($org->logo)
                <div class="card-photo-portrait">
                  <img src="{{ asset('storage/'.$org->logo) }}" alt="{{ $org->name }}">
                </div>
              @else
                <div class="card-photo-portrait no-logo" style="padding:0;">
                  <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=700&auto=format&fit=crop" alt="{{ $org->name }}">
                </div>
              @endif
          </div>
          <div class="card-body">
            <h4>{{ $org->name }}</h4>
            <p>{{ \Illuminate\Support\Str::limit($org->mission, 100) }}</p>
            @if($org->slogan)
              <p style="font-style:italic; color:var(--wine); font-size:.85rem; margin-top:6px;">"{{ $org->slogan }}"</p>
            @endif
            @if($org->meeting_day)
              <p style="color:var(--wine); font-weight:600; font-size:.85rem; margin-top:8px;">Meets {{ $org->meeting_day }} &middot; {{ $org->meeting_time }}</p>
            @endif
            <a href="{{ route('organisations.show', $org) }}" class="btn btn-sanctuary" style="margin-top:14px;">View Activities</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection