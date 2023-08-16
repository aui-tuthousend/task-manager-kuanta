{{--@extends('homeadmin.homeadmin')--}}
{{--@section('homeadm')--}}
    @include('navbar')

    @if(session('created'))
        <div id="created-message" class="alert alert-success">
            {{ session('created') }}
        </div>
    @endif
    <script>
        setTimeout(function() {
            var successMessage = document.getElementById('created-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000);
    </script>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


    <style>
        /*.sorting:before,*/
        .sorting:after,
        /*.sorting_asc:before,*/
        .sorting_asc:after,
        /*.sorting_desc:before,*/
        .sorting_desc:after,
        /*.sorting_asc_disabled:before,*/
        .sorting_asc_disbled:after,
        /*.sorting_desc_disabled:before {*/
        /*    display: none !important;*/
        /*}*/
        .sorting_desc_disabled:after {
            display: none !important;
        }
    </style>




</head>
<body>

<div class="container">

    <div class="panel panel-primary">
        <div class="panel-heading">

            <h1 >Halo {{Auth::user()->name}} </h1>
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <h2 class="mb-0">List Seluruh Tugas</h2>

                </div>
                <div class="d-flex flex-row-reverse ">
                    <a href='/addtask' class="btn btn-primary me-2">Add Task + </a>
                    <button type="button" class="btn btn-info me-2" data-toggle="modal" data-target="#modaldownload">
                        Download
                    </button>
                    <a href='/register' class="btn btn-warning me-2">Register</a>
                </div>
            </div>
            <hr/>
            @if(session('deleted'))
                <div id="success-message" class="alert alert-success">
                    {{ session('deleted') }}
                </div>
            @endif
            <script>
                // Remove the success message after 3 seconds
                setTimeout(function() {
                    var successMessage = document.getElementById('success-message');
                    if (successMessage) {
                        successMessage.style.display = 'none';
                    }
                }, 3000);
            </script>

        </div>
{{--        <p>--}}
        <div class="panel-body">

            <table class="table table-hover" id="mydata">
                <thead class="table-primary">

                <tr>
                    <th>id Task</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Role</th>
                    <th>Tanggal Dibuat</th>
                    <th>Presentase</th>

{{--                    <th>Action</th>--}}
                </tr>
                </thead>
                <tbody>
                @if ($tasks->count()>0)
                    @foreach($tasks as $task)

                        <tr onclick="window.location='{{ route('detailadmin', $task->id) }}';" style="cursor: pointer;">
                            <td class="align-middle">{{$task->id}}</td>

{{--                            <td class="align-middle">--}}
{{--                                <a href="{{ route('detailadmin', $task->id) }}" style="color: inherit; text-decoration: none;">{{ $task->judul }}</a>--}}
{{--                            </td>--}}
                            <td class="align-middle">{{$task->judul}}</td>

                            <td class="align-middle">{{$task->deskripsi}}</td>
                            <td class="align-middle">admin</td>
                            <td class="align-middle">{{$task->created_at}}</td>
                            <td class="align-middle">
                                @php
                                    $Task = \App\Models\Task::with('subtasks')->findOrFail($task->id);
                                       $totalSubtasks = $Task->subtasks->count();
                                       $completedSubtasks = $Task->subtasks->where('status', 'Done')->count();

                                       if ($totalSubtasks > 0) {
                                            $percentage = ($completedSubtasks / $totalSubtasks) * 100;
                                       } else {
                                           $percentage = 0;
                                       }
                                @endphp
                                <div class="progress">
                                    <div class="progress-bar @if($percentage >= 75) bg-success @elseif($percentage >= 50) bg-warning @else bg-danger @endif" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $percentage }}%</div>
                                </div>

                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Anda tidak punya tugas :D</td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
{{--        </p>--}}
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>

    $(function (){

        $("#mydata").DataTable();
    });
</script>
@include('homeadmin.download.modalform')

</body>
</html>

