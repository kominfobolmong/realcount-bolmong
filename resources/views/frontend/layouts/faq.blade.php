<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-4">
          <div class="content px-xl-5">
            <h3>Frequently Asked <strong>Questions</strong></h3>
          </div>
        </div>

        <div class="col-lg-8">

          <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

            @foreach ($faq as $item)

            <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $item->id }}">
                    <span class="num">{{ $loop->iteration }}.</span>
                    {!! $item->question !!}
                  </button>
                </h3>
                <div id="faq-content-{{ $item->id }}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    {!! $item->answer !!}
                  </div>
                </div>
              </div>

            @endforeach
            <!-- # Faq item-->
          </div>

        </div>
      </div>

    </div>
  </section>
