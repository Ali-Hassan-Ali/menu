
    <section id="products" class="features pt-2 d-none ">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <ul class="nav nav-tabs row flex-nowrap  g-2 d-flex">

              @foreach($products as $product)

                <li class="nav-item col-3">
                  <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-{{ $product->id }}">
                    <div class="img img1">
                      <h4 class="mb-2">{{ $product->name }}</h4>
                    </div>
                  </a>
                </li><!-- End tab nav item -->

              @endforeach

            </ul>

            <div class="tab-content">

              @foreach($products as $product)

              <div class="tab-pane {{ $lopp->first ? 'active show' : '' }}" id="tab-{{ $product->id }}">
                <div class="row">
                  <div class="col-6  mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="d-flex justify-content-between">
                      <p class="fst-italic">
                        {{ $product->price }} ريال
                      </p>
                      <h3>فول سوداني</h3>
                    </div>
                    <p class="mb-1 pb-1">المكونات</p>
                    <ul>
                      <li> حمص <i class="bi bi-check2-all"></i></li>
                      <li></i>لحمة مفرومة<i class="bi bi-check2-all"></i>
                      </li>
                      <li> زيت زيتتون
                        <i class="bi bi-check2-all"></i>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6 text-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ $product->image_path }}" alt="" class="img-fluid">
                  </div>
                </div>
              </div><!-- End tab content item -->

              @endforeach

            </div>
          </div>
        </div>
      </div>
    </section><!-- End Features Section -->