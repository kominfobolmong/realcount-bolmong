@extends('frontend.detail.app', ['menu' => 'Informasi', 'breadcrumb' => 'Kegiatan'])

@section('content')

<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

<div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 portfolio-container">
        @foreach ($kegiatan as $item)
            <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                <a href="{{ Storage::url($item->image) }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ Storage::url($item->image) }}" class="img-fluid" alt="" style="object-fit: cover;object-position: center;width: 100%;height: 200px;"></a>
                <div class="portfolio-info">
                    <p>{{ $item->created_at->diffForHumans() }}</p>
                    <p>{{ $item->caption }}</p>
                </div>
                </div>
            </div>
        @endforeach
      <!-- End Portfolio Item -->

    </div><!-- End Portfolio Container -->

</div>

<div class="blog-pagination">
  <ul class="justify-content-center">
      <li>{!! $kegiatan->links('layouts.pagination') !!}</li>
  </ul>
</div>

</div>
</section>

@endsection
