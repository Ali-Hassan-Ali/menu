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
                        <div class="form-group col-12 col-md-6 mb-5">
                            <label>@lang('products.status') <span class="text-danger">*</span></label>
                            <div class="form-switch">
                              <input class="form-check-input" type="checkbox" name="status" value="1" {{ old('status', $category->status) ? 'checked' : '' }}>
                            </div>
                        </div>

                    </div>{{-- row --}}

                        <h3>
                            <a class="btn btn-primary" id="add-item" data-index="1">
                                <i class="fa fa-plus text-light"></i>
                            </a>
                            @lang('products.add_items')
                        </h3>
                        <hr/>

                        {{-- request part --}}
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">@lang('products.name_en')<span class="text-danger">*</span></th>
                                        <th scope="col">@lang('products.name_ar')<span class="text-danger">*</span></th>
                                    </tr>
                                </thead>
                                <tbody id="append-item">
                                    @if(old('item_name_en'))
                                        @foreach(old('item_name_en') as $index=>$item)
                                        <tr>
                                            <th scope="row">
                                                <button class="btn btn-danger remove-item" data-eir-no="">
                                                    <i class="fa fa-remove"></i>
                                                </button>
                                            </th>
                                            <td>
                                                <input type="text" name="item_name_en[]" value="{{ old('item_name_en')[$index] }}" 
                                                class="form-control" required autofocus placeholder="{{ trans('products.name_en') }}">
                                            </td>
                                            <td>
                                                <input type="text" name="item_name_ar[]" value="{{ old('item_name_ar')[$index] }}"
                                                class="form-control" required autofocus placeholder="{{ trans('products.name_ar') }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        @if($product->items)
                                            @foreach($product->items as $item)
                                            <tr>
                                                <th scope="row">
                                                    <button class="btn btn-danger remove-item" data-eir-no="">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                </th>
                                                <td>
                                                    <input type="text" name="item_name_en[]" value="{{ $item->getTranslation('name', 'en') }}" 
                                                    class="form-control" required autofocus placeholder="{{ trans('products.name_en') }}">
                                                </td>
                                                <td>
                                                    <input type="text" name="item_name_ar[]" value="{{ $item->getTranslation('name', 'ae') }}"
                                                    class="form-control" required autofocus placeholder="{{ trans('products.name_ar') }}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    @endif
                                </tbody>

                            </table>
                            
                        </div>{{-- table-responsive --}}


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('dashboard.update')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
@push('scripts')
    @include('dashboard.products.script')
@endpush