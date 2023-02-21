@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('products.products')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('dashboard.home') }}">@lang('dashboard.home')</a></li>
        <li class="breadcrumb-item"><a class="back-page" href="{{ route('dashboard.products.index') }}">@lang('products.products')</a></li>
        <li class="breadcrumb-item">@lang('site.edit')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('dashboard.products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">

                        @php
                            $langs = ['ar', 'en'];
                        @endphp

                        @foreach ($langs as $lang)

                        {{--hours_worked--}}
                        <div class="form-group col-6">
                            <label>@lang('products.name_' . $lang) <span class="text-danger">*</span></label>
                            <input type="text" name="name_{{ $lang }}" class="form-control @error('name_' . $lang) is-invalid @enderror" value="{{ old('name_' . $lang, $product->getTranslation('name', $lang)) }}" autofocus>
                            @error('name_' . $lang)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @endforeach

                        @foreach ($langs as $lang)

                            {{--hours_worked--}}
                            <div class="form-group">
                                <label>@lang('products.description_' . $lang) <span class="text-danger">*</span></label>
                                <textarea name="description_{{ $lang }}" class="form-control" rows="5">{{ old('description_' . $lang, $product->getTranslation('description', $lang)) }}</textarea>
                                @error('description_' . $lang)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        @endforeach

                                                {{--cost--}}
                        <div class="form-group col-12 col-md-6">
                            <label>@lang('products.price') <span class="text-danger">*</span></label>
                            <div class="input-group mb-2">
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--image--}}
                        <div class="form-group col-12 col-md-6">
                            <label>@lang('products.image') <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control load-image">
                            <img src="{{ $product->image_path }}" class="loaded-image" alt="" style="display: block; width: 200px; margin: 10px 0;">
                        </div>

                        {{--categorys--}}
                        <div class="form-group col-12 col-md-6">
                            <label>@lang('categorys.categorys') <span class="text-danger">*</span></label>
                            <select name="category_id" id="category" class="form-control select2" required>
                                <option value="">@lang('dashboard.choose')</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{--status--}}
                        <div class="form-group col-12 col-md-6">
                            <label>@lang('products.status') <span class="text-danger">*</span></label>
                            <div class="form-switch">
                              <input class="form-check-input" type="checkbox" name="status" value="{{ old('status', $product->status) }}" {{ old('status', $category->status) ? 'checked' : '' }}>
                            </div>
                        </div>

                    </div>{{-- row --}}


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('dashboard.update')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
