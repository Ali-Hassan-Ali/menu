    <div class="container" id="sec">
      <div class="row  justify-content-center ">
        <div class="col-md-7 col-12">
          <div class="menu">
            <div class="row justify-content-center">
              @foreach($categorys as $index=>$category)

                <div class="col-6">
                  <div class="img1 img" id="img{{ $index }}">
                    <p>{{ $category->name }}</p>
                  </div>
                </div>

              @endforeach
            </div>

          </div>
        </div>
      </div>
    </div>