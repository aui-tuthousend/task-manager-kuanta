@include('navbar')
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Download</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>

<link rel="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"/>

</head>
<body>
<div class="container py-3">
    <div class="d-flex align-items-center justify-content-between">

{{--        <div class="panel-heading">Panel Heading</div>--}}
        <div class="panel-body">
            <hr/>
            <table class="table table-hover" id="mydata">
                <thead class="table-primary">
                <tr>
                    <th>Judul Task</th>
                    <th>Judul SubTask</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Dibuat</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Picked at</th>
                    <th>Done at</th>

                </tr>
                </thead>
                <tbody>
                @foreach($subtasks as $task)
                    @if ($subtasks->count()>0)

                        <tr>
                            <td class="align-middle">{{$task->judul_task}}</td>
                            <td class="align-middle">{{$task->judul}}</td>
                            <td class="align-middle">{{$task->deskripsi}}</td>
                            <td class="align-middle">{{$task->created_at}}</td>
                            <td class="align-middle">{{$task->deadline}}</td>
                            <td class="align-middle">{{$task->status}}</td>
                            <td class="align-middle">{{$task->picked_at}}</td>
                            <td class="align-middle">{{$task->done_at}}</td>
                        </tr>
                    @else
                        <tr>
                            <td class="align-middle">Tidak ada SUbTask</td>
                        </tr>
                    @endif


                @endforeach
                </tbody>
            </table>

{{--        </div>--}}

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

            <script>
                $(function (){
                   $("#mydata").DataTable({
                       dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>' + // Menambahkan opsi dom di sini
                           'Brtip',
                       buttons: [
                           // 'copyHtml5',
                           'excelHtml5',
                           'csvHtml5',
                           'pdfHtml5'
                       ]
                   });
                });

            </script>

</body>
</div>
</div>
