@extends('frontend.detail.app', ['menu' => 'Informasi', 'breadcrumb' => 'Detail Berita'])

@section('content')

<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">

        <div class="col-lg-8">

          <article class="blog-details">

            <div class="post-img">
              <img src="{{ $news->image ?? null }}" alt="{{ $news->slug ?? null }}" class="img-fluid" style="object-fit: cover;object-position: center;width: 100%;height: 400px;">
            </div>

            <h2 class="title">{{ $news->title ?? null }}</h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ $news->user->name }}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ $news->created_at->diffForHumans() }}</time></a></li>
                {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li> --}}
              </ul>
            </div><!-- End meta top -->

            <div class="content">
                {!! $news->body ?? null !!}
            </div><!-- End post content -->

            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="#">{{ $news->category->name }}</a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                @foreach ($news->tags as $item)
                <li><a href="#">{{ $item->name }}</a></li>
                @endforeach
              </ul>
            </div><!-- End meta bottom -->

          </article><!-- End blog post -->

        </div>

        <div class="col-lg-4">

          <div class="sidebar">

            <div class="sidebar-item search-form">
              <h3 class="sidebar-title">Cari Berita</h3>
              <form action="" class="mt-3">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <div class="sidebar-item categories">
              <h3 class="sidebar-title">Kategori</h3>
              <ul class="mt-3">
                @foreach ($category as $item)
                <li><a href="#">{{ $item->name }} <span>({{ $item->news_count }})</span></a></li>
                @endforeach
              </ul>
            </div><!-- End sidebar categories-->

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Berita Populer</h3>

                @foreach ($news_new as $item)
                <div class="mt-3">
                    <div class="post-item mt-3">
                      <img src="{{ $item->image }}" alt="{{ $item->slug }}">
                      <div>
                        <h4><a href="{{ route('berita-detail', $item->slug) }}">{{ $item->title }}</a></h4>
                        <time datetime="2020-01-01">{{ $item->created_at->diffForHumans() }}</time>
                      </div>
                    </div><!-- End recent post item-->
                  </div>
                @endforeach

            </div><!-- End sidebar recent posts-->

            <div class="sidebar-item tags">
              <h3 class="sidebar-title">Tags</h3>
              <ul class="mt-3">
                @foreach ($tags as $item)
                <li><a href="#">{{ $item->name }}</a></li>
                @endforeach
              </ul>
            </div><!-- End sidebar tags-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section>

@endsection
