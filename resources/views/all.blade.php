<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
  </head>
  <body>
    <div class="container">
      <h2>Hover Rows</h2>
      <p>The .table-hover class enables a hover state on table rows:</p>
      <table class="table table-hover table-bordered table-striped" id="studenttable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Fee</th>
            <th>Birth Date</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $s)
          <tr>
            <td>{{ $s -> name }}</td>
            <td>{{ $s -> address }}</td>
            <td>{{ $s -> contact }}</td>
            <td>{{ $s -> email }}</td>
            <td>{{ $s -> fee }}</td>
            <td>{{ $s -> birth_date }}</td>
            <td><button>Edit</button></td>
            <td><button>Delete</button></td>
          </tr>
          @endforeach
          <tfoot>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Fee</th>
            <th>Birth Date</th>
            <th>Edit</th>
            <th>Delete</th>
          </tfoot>
        </tbody>
      </table>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
          $('#studenttable tfoot th').each( function () {
              var title = $(this).text();
              if(title != 'Edit' && title != 'Delete')
              {
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
              }
          } );
          var table = $('#studenttable').DataTable({
            "columnDefs": [ {
              "targets": [6,7],
              "orderable": false
            } ],
            dom: 'Bfrtip',
              buttons: [
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5'
              ],
          });
          table.columns().every( function () {
              var that = this;

              $( 'input', this.footer() ).on( 'keyup change clear', function () {
                  if ( that.search() !== this.value ) {
                      that
                          .search( this.value )
                          .draw();
                  }
              } );
          } );
        } );
    </script>
  </body>
</html>
