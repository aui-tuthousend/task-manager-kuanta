@extends('homeadmin.homeadmin')
@section('homeadm')
    <h1 >Halo {{Auth::user()->name}} </h1>
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">List Tugas</h2>
        <a href='/addtask' class="btn btn-primary">Add Task + </a>
    </div>
    <hr/>
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>id Task</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
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
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-warning me-2">Pick</button>
                            <a href="{{route('detailadmin', $task->id)}}" class="btn btn-primary">details</a>
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
