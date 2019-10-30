<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Laravel  Image Intervention</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h3 class="jumbotron">Laravel  Image Intervention </h3>
      @if(Session::has('success'))
          <span style="color:green">{{ Session::get('success') }}</span>
      @endif
        <form method="post" action="{{ URL::to('store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
              <input type="file" name="image[]" class="form-control" multiple>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="form-group col-md-4">
              <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
              </div>
            </div>
      </form>
    </div>
    <div class="">
      @foreach($images as $image)
        <img style="width:200px" src="{{ URL::to('uploads/images/'.$image->filename) }}" alt="">
      @endforeach
    </div>
  </body>
</html>
