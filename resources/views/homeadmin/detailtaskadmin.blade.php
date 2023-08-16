@include('navbar')

<div class="container py-3">
    <h2>Detail Tugas</h2>
    <br/>
    <u>Judul</u>
    <h4>{{$Task->judul}}</h4>
    <u>Deskripsi</u>
    <h4>{{$Task->deskripsi}}</h4>
    <br/>
    <u>Seluruh SubTask</u>
    <table class="table">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
        <thead class="table-primary">
        <tr>
            <th>id SubTask</th>
            <th>Judul SubTask</th>
            <th>Deskripsi</th>
            <th>Tagged User</th>
            <th>Status</th>
            <th>Deadline</th>
        </tr>
        </thead>
        <tbody>
        @if ($Task->subtasks->count()>0)
            @foreach($Task->subtasks as $post)
                <tr>
                    <td class="align-middle">{{$post->id}}</td>
                    <td class="align-middle">{{$post->judul}}</td>
                    <td class="align-middle">{{$post->deskripsi}}</td>
                    <td class="align-middle">{{$post->user_name}}</td>
                    <td class="align-middle">{{$post->status}}</td>
                    <td class="align-middle">{{$post->deadline}}</td>
                </tr>
{{--                <x-blog.detail :post="$post" />--}}
            @endforeach

        @else
            <tr>
                <td class="text-center" colspan="5">Tidak ada sub task</td>
            </tr>
        @endif
        </tbody>
    </table>

    <br/>
    <a href='{{route('update', $Task->id)}}' class="btn btn-primary">Edit</a>
    @if ($Task->subtasks->count()==0)
        <form action="{{route('deleteadm', $Task->id)}}" type="button" method="POST" class="btn btn-danger p-0 mt-0" onclick="return confirm('Delete Task?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mt-2" >delete</button>
        </form>
    @endif

</div>
