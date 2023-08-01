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
        <thead class="table-primary">
        <tr>
            <th>id SubTask</th>
            <th>Judul SubTask</th>
            <th>Deskripsi</th>
            <th>Tagged User</th>
            <th>Deadline</th>
{{--            <th>Action</th>--}}
        </tr>
        </thead>
        <tbody>
        @if ($Task->subtasks->count()>0)
        @foreach($Task->subtasks as $post)
            <x-blog.detail :post="$post" />
        @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Tidak ada sub task untuk anda</td>
            </tr>
        @endif
        </tbody>
    </table>


</div>
