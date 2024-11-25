@extends('frontend.detail.app', ['menu' => 'Informasi', 'breadcrumb' => 'Berita'])

@section('content')

<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4 posts-list">

        @foreach ($news as $item)
        <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="{{ $item->image }}" alt="{{ $item->slug }}" class="img-fluid" style="object-fit: cover;object-position: center;width: 100%;height: 200px;">
              </div>

              <p class="post-category">{{ $item->category->name }}</p>

              <h2 class="title">
                <a href="{{ route('berita-detail', $item->slug) }}">{{ $item->title }}</a>
              </h2>

              <div class="d-flex align-items-center">
                <div class="post-meta">
                  <p class="post-author-list">{{ $item->user->name }}</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">{{ $item->created_at->diffForHumans() }}</time>
                  </p>
                </div>
              </div>

            </article>
          </div>
        @endforeach

      </div><!-- End blog posts list -->

      <div class="blog-pagination">
        <ul class="justify-content-center">
          <li>{!! $news->links('layouts.pagination') !!}</li>
        </ul>
      </div>
      <!-- End blog pagination -->

    </div>
  </section>

@endsection
