@include('navbar')
    <!DOCTYPE html>
<html>
<head>
    <title>List User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>--}}

    <link rel="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"/>


</head>
<body>
<div class="container py-3">
    <div class="container">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>User List</h2>

                </div>
                <div class="panel-body">
                    <table  class="table table-hover table-bordered" id="mydata">
                        <thead class="table-bordered table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td class="align-middle">{{$user->id}}</td>
                                <td class="align-middle">{{$user->name}}</td>
                                <td class="align-middle">{{$user->email}}</td>
                                <td class="align-middle">+62</td>
                                <td class="align-middle">{{$user->role}}</td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
{{--<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>--}}
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<script>
    $(function (){
        $("#mydata").DataTable();
    })
</script>

</body>
</html>
