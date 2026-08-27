@extends('layouts.app')
@section('title', 'School — St John the Apostle Parish')

@section('content')
<section class="page-hero">
  <span class="eyebrow">St John the Apostle Nursery and Primary School</span>
  <h1>Forming Minds and Hearts</h1>
  <p>Catholic education from Creche through Primary school level, integrating academic excellence with faith formation.</p>
</section>

<section>
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">School Life</span>
      <h2>School Activities</h2>
    </div>
    <div class="card-grid">
      @forelse($activities as $activity)
        <div class="card">
          <div class="card-photo">
            @if($activity->photo)
              <img src="{{ asset('storage/'.$activity->photo) }}" alt="{{ $activity->title }}">
            @else
              <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=700&auto=format&fit=crop" alt="{{ $activity->title }}">
            @endif
          </div>
          <div class="card-body">
            <h4>{{ $activity->title }}</h4>
        @if($activity->recurrence)
        <p style="color:var(--wine); font-weight:600; font-size:.85rem;">{{ $activity->recurrence }}</p>
        @elseif($activity->date)
        <p style="color:var(--wine); font-weight:600; font-size:.85rem;">{{ \Carbon\Carbon::parse($activity->date)->format('F j, Y') }}</p>
        @endif
            <p>{{ $activity->description }}</p>
          </div>
        </div>
      @empty
        <p>No school activities posted yet — check back soon.</p>
      @endforelse
    </div>
  </div>
</section>

<section style="background:var(--ivory-dim);">
  <div class="wrap">
    <div class="section-head" style="margin:0 auto 32px; text-align:center; max-width:600px;">
      <span class="eyebrow">Admissions</span>
      <h2>Enroll Your Child</h2>
      <p>Fill the form below and our school office will reach out to you.</p>
    </div>

    @if(session('success'))
      <div class="alert-success" style="max-width:560px; margin:0 auto 24px;">{{ session('success') }}</div>
    @endif

    <form class="parish-form" style="margin:0 auto;" method="POST" action="{{ route('school.enroll') }}">
      @csrf
      <label>Guardian's Full Name</label>
      <input type="text" name="guardian_name" required value="{{ old('guardian_name') }}">

      <label>Phone Number</label>
      <input type="text" name="phone" required value="{{ old('phone') }}">

      <label>Email (optional)</label>
      <input type="email" name="email" value="{{ old('email') }}">

      <label>Child's Intended Class/Level</label>
      <input type="text" name="child_class" placeholder="e.g. Primary 3" value="{{ old('child_class') }}">

      <label>Message</label>
      <textarea name="message" rows="4"></textarea>

      <button type="submit" class="btn btn-gold">Submit Inquiry</button>
    </form>
  </div>
</section>
@endsection