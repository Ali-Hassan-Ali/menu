<div class="container" id="sec">
  <div class="row  justify-content-center ">
    <div class="col-md-7 col-12">
      <div class="menu">
        <div class="row justify-content-center">
          @foreach($categorys as $index=>$category)

            <div class="col-6">
              <div class="img{{ $category->id }} img" id="img{{ $category->id }}">
                <p>{{ $category->name }}</p>
              </div>
            </div>

          @endforeach
        </div>

      </div>
    </div>
  </div>
</div>