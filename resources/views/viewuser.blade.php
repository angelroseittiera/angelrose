<!DOCTYPE html>
<html>
<head>
    <title>Laravel Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .table th, .table td {
            vertical-align: middle !important;
        }
        a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>

<div class="container mt-5">
<a href="{{ url('/adminhome') }}">Back</a>
    <h2 class="mb-4">User List</h2>
    <table id="myTable" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>SI NO</th>
                <th>User Name</th>
                <th>Email Id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {
          var table = $('#myTable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('viewuser') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'email', name: 'email'},
                  {data: 'action', name: 'action', orderable: false, searchable: false}
              ]
          });
        });
    $('body').on('click', '.delete', function () {
        var url = $(this).data('url');
        if(confirm("Are you sure you want to delete this user?")){
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
            });
        }
    });
</script>
@if (isset($success))
<script>
    alert("{{ $success }}");
</script>
@endif
</body>
</html>
