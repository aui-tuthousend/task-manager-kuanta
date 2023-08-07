@include('navbar')
<div class="container py-3">

    <h1 >Halo {{Auth::user()->name}} </h1>
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">Your Finished SubTask</h2>
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
            <th>Tanggal Selesai</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($subtasks as $task)
                @if($task->status == "Done")
                @if ($subtasks->count()==0)
                    <tr>
                        <td class="text-center" colspan="5">Anda tidak punya tugas :D</td>
                    </tr>
                @endif
                <tr>
                    <td class="align-middle">{{$task->judul_task}}</td>
                    <td class="align-middle">{{$task->judul}}</td>
                    <td class="align-middle">{{$task->deskripsi}}</td>
                    <td class="align-middle">{{$task->deadline}}</td>
                    <td class="align-middle">{{$task->created_at}}</td>
                    <td class="align-middle">{{$task->done_at}}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
{{--                                <form action="{{route('undo', $task->id)}}" type="button" method="POST" class="btn btn-dark p-0 me-1" onclick="return confirm('Undo Finished SubTask?')">--}}
{{--                                    @csrf--}}
{{--                                    @method('POST')--}}
{{--                                    <button class="btn btn-dark m-0" >Undo</button>--}}
{{--                                </form>--}}

                            <a href="{{route('detail', $task->id_task)}}" class="btn btn-info">details</a>
                            {{--                        <button type="button" class="btn btn-primary">Right</button>--}}
                        </div>
                    </td>
                </tr>
                @endif
            @endforeach

        </tbody>
    </table>
    <div class="ms-2 pt-1">
        {{ $subtasks->links() }}
    </div>

</div>




