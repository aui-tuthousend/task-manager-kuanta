@extends('homepage.hometeam')
@section('hometeam')
    <h1 >Halo {{Auth::user()->name}} </h1>
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">List Sub Tugas</h2>
        <a href='/addtask' class="btn btn-primary">Add Task + </a>
    </div>
    <hr/>
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>Judul Task</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($subtasks->count()>0)
        @foreach($subtasks as $task)
            <tr>
                <td class="align-middle">{{$task->judul_task}}</td>
                <td class="align-middle">{{$task->judul}}</td>
                <td class="align-middle">{{$task->deskripsi}}</td>
                <td class="align-middle">{{$task->created_at}}</td>
                <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning me-2">Pick</button>
                        <a href="{{route('detail', $task->id_task)}}" class="btn btn-primary">details</a>
{{--                        <button type="button" class="btn btn-primary">Right</button>--}}
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

@endsection

