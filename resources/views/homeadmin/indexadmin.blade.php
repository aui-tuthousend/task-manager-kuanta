@extends('homeadmin.homeadmin')
@section('homeadm')

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

    <h1 >Halo {{Auth::user()->name}} </h1>
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">List Tugas</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldownload">
            Download
        </button>
{{--        <a href='#' class="btn btn-primary" data-toggle="modal" data-target="#modaldownload">Download</a>--}}

        <a href='/addtask' class="btn btn-primary">Add Task + </a>
        <a href='/register' class="btn btn-primary">Register</a>
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
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>id Task</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
            <th>Presentase</th>
            <th></th>
            <th></th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($tasks->count()>0)
            @foreach($tasks as $task)
                <tr>
                    <td class="align-middle">{{$task->id}}</td>
                    <td class="align-middle">{{$task->judul}}</td>
                    <td class="align-middle">{{$task->deskripsi}}</td>
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

                        {{--                        <div class="progress">--}}
{{--                            <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $percentage }}%</div>--}}
{{--                        </div>--}}
{{--                        Selesai: {{ $completedSubtasks }} dari {{ $totalSubtasks }} subtask ({{ $percentage }}%)--}}
                    </td>
                    <td class="align-middle"></td>
                    <td class="align-middle"></td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('detailadmin', $task->id)}}" class="btn btn-primary">details</a>
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
    <div class="ms-2 pt-1">
        {{ $tasks->links() }}
    </div>

    @include('homeadmin.download.modalform')

@endsection

