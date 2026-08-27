<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'St John the Apostle Parish, Isiakpu Nsukka')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<header>
  <nav>
    <a href="{{ route('home') }}" class="brand">
      <div class="brand-mark">
        <img src="{{asset('images/Requesting_picture_of_Saint_John_202608140519.jpeg')}}" alt="St John the Apostle">
      </div>
      <div class="brand-name">St John the Apostle Parish<span>Isiakpu Nsukka</span></div>
    </a>
    <button class="nav-toggle" id="navToggle">&#9776;</button>
        <ul class="nav-links" id="navLinks">
        <li><a href="{{ route('about') }}">About</a></li>

        <li class="has-dropdown">
            <span class="dropdown-trigger">Parish Life &#9662;</span>
            <ul class="dropdown-menu">
            <li><a href="{{ route('activities') }}">Parish Activities</a></li>
            <li><a href="{{ route('pious') }}">Pious Organisations</a></li>
            <li><a href="{{ route('zones') }}">Zones &amp; Stations</a></li>
            <li><a href="{{ route('gallery') }}">Photos &amp; Videos</a></li>
            </ul>
        </li>

        <li><a href="{{ route('buildings') }}">Buildings</a></li>
        <li><a href="{{ route('school') }}">School</a></li>
        <li><a href="{{ route('reflections') }}">Reflections</a></li>
        <li><a href="{{ route('mass-schedule') }}">Mass Times</a></li>

        <li class="has-dropdown">
            <span class="dropdown-trigger">Give &#9662;</span>
            <ul class="dropdown-menu">
            <li><a href="{{ route('mass-booking.create') }}">Book a Mass</a></li>
            <li><a href="{{ route('donations') }}">Support a Project</a></li>
            </ul>
        </li>

        <li class="has-dropdown">
            <span class="dropdown-trigger nav-cta">Contact &#9662;</span>
            <ul class="dropdown-menu">
            <li><a href="{{ route('contact') }}">Contact Office</a></li>
            <li><a href="{{ route('catechists') }}">Catechists</a></li>
            </ul>
        </li>
        </ul>
  </nav>
</header>

@yield('content')
<footer>
  <div class="wrap">
    <div class="footer-grid">
      <div>
        <h5>St John the Apostle Parish</h5>
        <p>Isiakpu Nsukka<br>Nsukka Diocese</p>
      </div>
      <div>
        <h5>Visit</h5>
        <ul>
          <li><a href="{{ route('mass-schedule') }}">Mass Schedule</a></li>
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('buildings') }}">Buildings</a></li>
        </ul>
      </div>
      <div>
        <h5>Community</h5>
        <ul>
          <li><a href="{{ route('activities') }}">Parish Activities</a></li>
          <li><a href="{{ route('zones') }}">Zones &amp; Stations</a></li>
          <li><a href="{{ route('school') }}">School</a></li>
        </ul>
      </div>
      <div>
        <h5>Give</h5>
        <ul>
          <li><a href="{{ route('mass-booking.create') }}">Book a Mass</a></li>
          <li><a href="{{ route('donations') }}">Support a Project</a></li>
          <li><a href="{{ route('contact') }}">Contact Office</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">&copy; {{ date('Y') }} St John the Apostle Parish, Isiakpu Nsukka.</div>
  </div>
</footer>

<script>
  document.getElementById('navToggle').addEventListener('click', function(){
    document.getElementById('navLinks').classList.toggle('open');
  });
</script>
</body>
</html>