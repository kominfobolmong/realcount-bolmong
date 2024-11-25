  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" style="margin: 1%;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
    <div class="carousel-inner">
        @foreach ($sliders as $item)
            <div class="carousel-item @if ($loop->first)
                active
            @endif">
                <img src="{{ $item->image }}" class="d-block w-100" alt="{{ $item->caption }}">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
