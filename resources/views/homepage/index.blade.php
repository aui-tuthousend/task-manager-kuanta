@extends('homepage.hometeam')
@section('hometeam')
    <h1 >Halo {{Auth::user()->name}} </h1>
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">List Sub Tugas</h2>
        <a href='/addtask' class="btn btn-dark">Add Task + </a>
    </div>
    <hr/>
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>Judul Task</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Deadline</th>
            <th>Tanggal Dibuat</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($subtasks->count()>0)
        @foreach($subtasks as $task)
            @if($task->status != "Done")
            <tr>
                <td class="align-middle">{{$task->judul_task}}</td>
                <td class="align-middle">{{$task->judul}}</td>
                <td class="align-middle">{{$task->deskripsi}}</td>
                <td class="align-middle">{{$task->deadline}}</td>
                <td class="align-middle">{{$task->created_at}}</td>
                <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        @if($task->status === "Progres")
                            <form action="{{route('done', $task->id)}}" type="button" method="POST" class="btn btn-dark p-0 me-1" onclick="return confirm('SubTask Done?')">
                                @csrf
                                @method('POST')
                                <button class="btn btn-dark m-0" >done</button>
                            </form>
                        @else
{{--                        <button type="button" class="btn btn-warning me-2">Pick</button>--}}
{{--                        <a href="{{route('pick', $task->id)}}" class="btn btn-primary">pick</a>--}}
                            <form action="{{route('pick', $task->id)}}" type="button" method="POST" class="btn btn-primary p-0 me-1">
                                @csrf
                                @method('POST')
                                <button class="btn btn-primary m-0" >pick</button>
                        </form>
                        @endif


                        <a href="{{route('detail', $task->id_task)}}" class="btn btn-info">details</a>
{{--                        <button type="button" class="btn btn-primary">Right</button>--}}
                    </div>
                </td>
            </tr>
            @endif
        @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Anda tidak punya tugas :D</td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="float-end">
        <a href="{{route('finish')}}" class="btn btn-warning">Finished SubTask</a>
    </div>
    <div class="ms-2 pt-1">
        {{ $subtasks->links() }}
    </div>

@endsection

