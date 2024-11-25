<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Standar Pelayanan</h2>
      </div>

      <div class="row gy-4">
        <div class="offset-lg-1 col-lg-10 col-sm-12">

            <div class="accordion accordion-flush" id="servicelist" data-aos="fade-up" data-aos-delay="100">

              @foreach ($layanans as $item)

              <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#service-content-{{ $item->id }}">
                      <span class="num">{{ $loop->iteration }}.</span>
                      {{ Str::title($item->name) }}
                    </button>
                  </h3>
                  <div id="service-content-{{ $item->id }}" class="accordion-collapse collapse" data-bs-parent="#servicelist">
                    <div class="accordion-body">

                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                    <th scope="col" style="width: 5%;">No</th>
                                    <th scope="col" style="width: 25%;">Komponen</th>
                                    <th scope="col">Uraian</th>
                                  </tr>
                                </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td>Persyaratan pelayanan</td>
                                      <td>{!! $item->persyaratan !!}</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">2</th>
                                      <td>Prosedur</td>
                                      <td>{!! $item->prosedur !!}</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">3</th>
                                      <td>Waktu pelayanan</td>
                                      <td>{!! $item->waktu !!}</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">4</th>
                                      <td>Biaya/tarif</td>
                                      <td>{!! $item->biaya !!}</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">5</th>
                                      <td>Produk layanan</td>
                                      <td>{!! $item->produk_layanan !!}</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>

                    </div>
                  </div>
                </div>

              @endforeach

            </div>

          </div>
      </div>

    </div>
  </section>
