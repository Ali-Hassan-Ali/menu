  <section class="hero">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 col-12">
          <div id="hero">
            <div class="row d-flex justify-content-center">
              <div class="col-md-6 col-12 text-center">
                <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                	@foreach($sliders as $slider)

	                  <!-- Slide 1 -->
	                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image: url({{ $slider->image_path }})">
	                    <div class="carousel-container">
	                      <div class="container">
	                        <h2 class="animate__animated animate__fadeInDown">{{ $slider->name }}</h2>
	                        <p class="animate__animated animate__fadeInUp">
	                          {{ $slider->description }}
	                        </p>
	                      </div>
	                    </div>
	                  </div>

                	@endforeach

                  <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                  </a>

                  <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                  </a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>