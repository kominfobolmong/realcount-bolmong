<section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{ $contact->email ?? null }}">{{ $contact->email ?? null }}</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $contact->no_telp ?? null }}</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-youtube"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{ '/' }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        {{-- <img src="{{ asset('front/img/logo.png') }}" alt=""> --}}
        <h1>Dinas Koperasi Usaha Kecil dan Menengah<br>Kabupaten Bolaang Mongondow<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ '/' }}">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{ route('pimpinan') }}">Profil Pimpinan</a></li>
              <li><a href="{{ route('visimisi') }}">Visi Misi</a></li>
              <li><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
            </ul>
          </li>
          <li><a href="{{ route('layanan') }}">Layanan</a></li>
          <li><a href="{{ route('berita') }}">Berita</a></li>
          <li><a href="{{ route('koperasi') }}">Koperasi</a></li>
          <li><a href="{{ route('ukm') }}">UKM</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
