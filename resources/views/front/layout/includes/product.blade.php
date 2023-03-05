@if($subCategorys->count())
    <section id="products" class="features pt-2">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <ul class="nav nav-tabs row flex-nowrap g-2 d-flex">

              @foreach($subCategorys as $subCategory)

                <li class="nav-item col-3">
                  <a class="nav-link subCategory subCategory-{{ $subCategory->parent_id }} d-none"
                    data-id="{{ $subCategory->id }}">
                    <div class="img img{{ $subCategory->parent_id }}">
                      <h4 class="mb-2">{{ $subCategory->name }}</h4>
                    </div>
                  </a>
                </li><!-- End tab nav item -->

              @endforeach

            </ul>

            <div class="tab-content">


              @foreach($subCategorys as $subCategory)

                <div class="">
                    @foreach($subCategory->products as $product)
                      <div class="row product product-{{ $product->category_id }} d-none">
                        <div class="col-6 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                          <div class="d-flex justify-content-between">
                            <p class="fst-italic">
                              {{ $product->price }}
                              {{ trans('front.rial') }}
                            </p>
                            <h3>{{ $product->name }}</h3>
                          </div>
                          <p class="mb-1 pb-1">{{ trans('front.components') }}</p>
                          @if($product->items)
                          @foreach($product->items as $item)
                            <ul>
                              <li>
                                {{ $item->name }}
                                <i class="bi bi-check2-all"></i>
                              </li>
                            </ul>
                            @endforeach
                          @endif
                        </div>
                        <div class="col-6 text-center">
                          <img src="{{ $product->image_path }}" alt="" class="img-fluid">
                        </div>
                      </div>
                        @endforeach
                </div><!-- End tab content item -->


              @endforeach


            </div>
          </div>
        </div>
      </div>
    </section><!-- End Features Section -->
@endif