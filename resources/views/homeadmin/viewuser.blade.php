{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>User List</title>--}}

{{--    <link rel="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>--}}

{{--    <link rel="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"/>--}}

{{--</head>--}}
{{--<body>--}}
@include('navbar')
<div class="container py-3">
    <div class="container">
        <h2>User List</h2>
        <table id="users-table" class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        $('#users-table').DataTable({--}}
{{--            "ajax": "{{ route('users.data') }}",--}}
{{--            "columns": [--}}
{{--                { "data": "name" },--}}
{{--                { "data": "email" },--}}
{{--                { "data": "role" }--}}
{{--            ],--}}
{{--            "order": [[0, 'asc']]--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

{{--</body>--}}
{{--</html>--}}
