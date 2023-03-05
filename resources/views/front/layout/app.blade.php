<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ trans('front.home') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('front/assets/img/alrayah_logo.svg') }}" rel="icon">
  <link href="{{ asset('front/assets/img/alrayah_logo.svg') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('front/assets/css/main.css') }}" rel="stylesheet">
</head>

<body>

	@include('front.layout.includes.header')

	@yield('content')

  @include('front.layout.includes.footer')
  <!-- Vendor JS Files -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('front/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('front/assets/js/main.js') }}"></script>

  <script type="text/javascript">

    $(document).on('click', '.category', function(e) {
      e.preventDefault();
         let id = $(this).data('id');
         $('.subCategory').addClass('d-none');
          $('.product').addClass('d-none');
         $('.subCategory-' + id).each(function(index) {
              $(this).removeClass('d-none');
          });

    });

    $(document).on('click', '.subCategory', function(e) {
      e.preventDefault();

         let id = $(this).data('id');
         $('.product').addClass('d-none');

         $('.product-' + id).each(function(index) {
            $(this).removeClass('d-none');
        });

    });

  </script>

</body>

</html>