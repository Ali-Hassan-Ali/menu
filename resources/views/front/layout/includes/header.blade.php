<div class="header-top fixed-top">
    <div class="container d-flex justify-content-between">
      <a href="{{ route('change.lang', app()->getLocale() == 'ar' ? 'en': 'ar') }}">
        {{ trans('front.lang_'.  app()->getLocale()) }}
      </a>
      <a href="{{ route('home') }}">{{ trans('front.home') }}</a>
    </div>
  </div>