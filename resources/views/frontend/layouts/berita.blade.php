<section id="recent-posts" class="recent-posts sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Berita Terbaru</h2>
        {{-- <p></p> --}}
      </div>

      <div class="row gy-4">
        @foreach ($news as $item)
            <div class="col-xl-4 col-md-6">
            <article>

                <div class="post-img">
                <img src="{{ $item->image }}" alt="{{ $item->slug }}" class="img-fluid" style="object-fit: cover;object-position: center;width: 100%;height: 200px;">
                </div>

                <p class="post-category">{{ $item->category->name }}</p>

                <h2 class="title">
                <a href="{{ route('berita-detail', $item->slug) }}">{{ Str::limit($item->title, 50, '...') }}</a>
                </h2>

                <div class="d-flex align-items-center">
                <div class="post-meta">
                    <p class="post-author">{{ $item->user->name }}</p>
                    <p class="post-date">
                    <time datetime="2022-01-01">{{ $item->created_at->diffForHumans() }}</time>
                    </p>
                </div>
                </div>

            </article>
            </div>

        @endforeach
        <!-- End post list item -->

      </div><!-- End recent posts list -->

    </div>
  </section>
