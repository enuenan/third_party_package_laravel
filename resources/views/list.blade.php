<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="col-md-8">
        <h1>Employee List</h1>
        <!-- <a href="{{ URL::to('/employees/pdf') }}">Export PDF</a> -->
        <a href="{{ URL::to('pdf') }}"><button class="btn btn-primary" name="button">Download PDF</button></a>
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $employee)
              <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <img src="{{ asset('uploads/images/1572107064.png') }}" alt="" style="width:50%;height:50%">
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>
</html>
