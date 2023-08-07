@include('navbar')

<div class="container py-3">
    <h2>Preview Task</h2>
    <br/>
    <u>Judul</u>
    <h4>{{session('task')->judul}}</h4>
    <u>Deskripsi</u>
    <h4>{{session('task')->deskripsi}}</h4>
    <br/>
    <u>Subtask</u>
    <table class="table">
        <thead class="table-primary">
        <tr>
            <th>id SubTask</th>
            <th>Judul SubTask</th>
            <th>Deskripsi</th>
            <th>Tagged User</th>
            <th>Deadline</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if ($Task->subtasks->count()>0)
            @foreach($Task->subtasks as $sub)
                <tr>
                    <td class="align-middle">{{$sub->id}}</td>
                    <td class="align-middle">{{$sub->judul}}</td>
                    <td class="align-middle">{{$sub->deskripsi}}</td>
                    <td class="align-middle">{{$sub->user_name}}</td>
                    <td class="align-middle">{{$sub->deadline}}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href='{{route('edit', $sub->id)}}' type="button" class="btn btn-warning mb-auto p-2">edit</a>
                            <form action="{{route('delete', $sub->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete SubTask?')" class="btn btn-danger">delete</button>
                            </form>
{{--                                                                            <button type="button" class="btn btn-primary">Middle</button>--}}
{{--                                                                            <button type="button" class="btn btn-primary">Right</button>--}}
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Belum ada sub task yang dibuat</td>
            </tr>
        @endif
        </tbody>
    </table>

    <a href='{{'/addtask/previewtask/{id}/addsubtask', session('task')->id}}' class="btn btn-primary">Add Subtask</a>
    <br/>
    <br/>
    <br/>
    @if ($Task->subtasks->count()==0)
        <a href='/team' class="btn btn-primary" onclick="return confirm('Belum ada SubTask Yakin Save Task?')">Save Task & SubTask</a>
    @else
        <a href='/team' class="btn btn-primary">Save Task & SubTask</a>
    @endif

</div>
