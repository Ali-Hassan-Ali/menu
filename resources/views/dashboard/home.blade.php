@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('dashboard.home')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item">@lang('dashboard.home')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            {{--top statistics--}}
            <div class="row" id="top-statistics">

                
                {{-- status --}}
                <div class="col-md mb-2">

                    <a href="{{ route('dashboard.categorys.index') }}" class="btn btn-sm card data-ajax font-weight-bold" style="border: 4px solid #d5b209;">
                        
                        <div class="card-body p-1">

                            <h3 class="mb-0 text-center" id="eir-under-review-count" style="display: none;font-size: 50px;">{{ $productCount }}</h3>

                            <div class="d-flex justify-content-center mb-2 text-center">
                                <p class="mb-0" style="font-size: initial;">@lang('products.products')</p>
                            </div>

                            <div class="d-flex justify-content-center mb-2 text-center">
                                <p class="mb-0" style="font-size: initial;">{{ $productCount }}</p>
                            </div>

                        </div>

                    </a>

                </div><!-- end of col -->

                {{-- status --}}
                <div class="col-md mb-2">

                    <a href="{{ route('dashboard.categorys.index') }}" class="btn btn-sm card data-ajax p-2 font-weight-bold" style="border: 4px solid green;">
                        
                        <div class="card-body p-0">

                            <div class="d-flex justify-content-center mb-2 text-center">
                                <p class="mb-0" style="font-size: initial;">@lang('categorys.categorys')</p>
                            </div>

                            <div class="d-flex justify-content-center mb-2 text-center">
                                <p class="mb-0" style="font-size: initial;">{{ $categoryCount }}</p>
                            </div>

                        </div>

                    </a>

                </div><!-- end of col -->

                {{-- status --}}
                <div class="col-md mb-2">

                    <a href="{{ route('dashboard.sliders.index') }}" class="btn btn-sm card p-2 data-ajax font-weight-bold" style="border: 4px solid #0dcaf0;padding: inherit;">
                        
                        <div class="card-body p-0">

                            <div class="d-flex justify-content-center text-center text-centerw mb-2">
                                <p class="mb-0" style="font-size: initial;">@lang('sliders.sliders')</p>
                            </div>

                            <div class="d-flex justify-content-center mb-2 text-center">
                                <p class="mb-0" style="font-size: initial;">{{ $sliderCount }}</p>
                            </div>

                        </div>

                    </a>

                </div><!-- end of col -->


            </div><!-- end of row -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection

@push('scripts')

    
@endpush