@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('categorys.categorys')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('dashboard.home') }}">@lang('dashboard.home')</a></li>
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('dashboard.categorys.index') }}">@lang('categorys.categorys')</a></li>
        <li class="breadcrumb-item">@lang('dashboard.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('dashboard.categorys.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="row">

                        @php
                            $langs = ['ar', 'en'];
                        @endphp

                        @foreach ($langs as $lang)

                        {{--hours_worked--}}
                        <div class="form-group col-6">
                            <label>@lang('categorys.name_' . $lang) <span class="text-danger">*</span></label>
                            <input type="text" name="name_{{ $lang }}" class="form-control @error('name_' . $lang) is-invalid @enderror" value="{{ old('name_' . $lang) }}" autofocus>
                            @error('name_' . $lang)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @endforeach

                        {{--image--}}
                        <div class="form-group col-12 col-md-6">
                            <label>@lang('categorys.image') <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control load-image">
                            <img src="{{ auth()->user()->image_path }}" class="loaded-image" alt="" style="display: block; width: 200px; margin: 10px 0;">
                        </div>


                        {{--status--}}
                        <div class="form-group col-12 col-md-6 mb-5">
                            <label>@lang('products.status') <span class="text-danger">*</span></label>
                            <div class="form-switch">
                              <input class="form-check-input" type="checkbox" name="status" value="1" {{ old('status', 1) ? 'checked' : '' }}>
                            </div>
                        </div>

                    </div>{{-- row --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>@lang('dashboard.create')
                        </button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection