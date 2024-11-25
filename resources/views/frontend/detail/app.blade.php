<!DOCTYPE html>

<html lang="en">
<head>
    @include('frontend.layouts.head')
</head>

<body>

<!-- ======= Header ======= -->
@include('frontend.layouts.header')
<!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>{{ $breadcrumb }}</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="#">{{ $menu }}</a></li>
            <li>{{ $breadcrumb }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
      <div class="container">

        @yield('content')

      </div>
    </section>

  </main><!-- End #main -->


	@include('frontend.layouts.footer')

    @include('frontend.layouts.foot')

  </body>
  </html>
