@include('navbar')

<div class="container py-3">
<div class="d-flex align-items-center justify-content-between">
    <h2 class="mb-0">List Tugas {{$user->name}}</h2>
    <a href='{{route('export')}}' class="btn btn-primary">Export</a>
</div>
<hr/>
    <table class="table table-hover">
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
</div>
