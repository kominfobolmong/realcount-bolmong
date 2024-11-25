<section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Selamat Datang / Dega' Niondon</h2>
        <p>Dinas Kesehatan Kabupaten Bolaang Mongondow</p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-6">
          <h3>Maklumat Pelayanan</h3>
          <img src="{{ Storage::url($profil->maklumat ?? null) }}" class="img-fluid rounded-4" alt="maklumat-image">
        </div>
        <div class="col-lg-6">
            <h3>Jenis Pelayanan</h3>
            <img src="{{ Storage::url($profil->motto ?? null) }}" class="img-fluid rounded-4" alt="motto-image">
          {{-- <div class="content ps-0 ps-lg-5">
            <div class="position-relative mt-4">
              <img src="assets/img/about-2.jpg" class="img-fluid rounded-4" alt="">
              <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
            </div>
          </div> --}}
        </div>
      </div>

    </div>
  </section>
