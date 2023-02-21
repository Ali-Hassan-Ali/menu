@extends('front.layout.app')

@section('content')


  <!-- ======= Hero Section ======= -->

  @include('front.layout.includes.media')

  @include('front.layout.includes.sliders')



  <main id="main" class="mt-3">


    @include('front.layout.includes.category')

    <!-- ======= Features Section ======= -->

    @include('front.layout.includes.product')

    @include('front.layout.includes.contact')



    <footer>
      <p>الاسعار تشمل ضريبة القيمة المضافة</p>
      <p>يحتاج البالغون ل2000 سعرة حرارية في اليوم وقد تختلف من شخص لآخر</p>
    </footer>

  </main><!-- End #main -->

@endsection