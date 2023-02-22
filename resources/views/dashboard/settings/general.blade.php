@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('settings.settings')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">@lang('dashboard.home')</a></li>
        <li class="breadcrumb-item">@lang('settings.general_settings')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('dashboard.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    {{--logo_one--}}
                    <div class="form-group">
                        <label>@lang('settings.logo_one')</label>
                        <input type="file" name="logo_one" class="form-control load-image">
                        <img src="{{ Storage::url('uploads/' . setting('logo_one')) }}" class="loaded-image" alt="" style="display: {{ setting('logo_one') ? 'block' : 'none' }}; width: 100px; margin: 10px 0;">
                    </div>

                    {{--logo_tow--}}
                    <div class="form-group">
                        <label>@lang('settings.logo_tow')</label>
                        <input type="file" name="logo_tow" class="form-control load-image">
                        <img src="{{ Storage::url('uploads/' . setting('logo_tow')) }}" class="loaded-image" alt="" style="display: {{ setting('logo_tow') ? 'block' : 'none' }}; width: 50px; margin: 10px 0;">
                    </div>

                    {{--title--}}
                    <div class="form-group">
                        <label>@lang('settings.title')</label>
                        <input type="text" name="title" class="form-control" value="{{ setting('title') }}">
                    </div>

                    {{--description--}}
                    {{-- <div class="form-group">
                        <label>@lang('settings.description')</label>
                        <textarea name="description" class="form-control">{{ setting('description') }}</textarea>
                    </div> --}}

                    @php
                        $links = ['facebook', 'twitter', 'instagram', 'tiktok'];
                    @endphp

                    @foreach($links as $link)

                        {{--keywords--}}
                        <div class="form-group">
                            <label>{{ $link }}</label>
                            <input type="text" name="{{ $link }}" class="form-control" value="{{ setting($link) }}">
                        </div>

                    @endforeach

                    {{--submit--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.update')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection