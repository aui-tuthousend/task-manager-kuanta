@include('navbar')

<div class="container py-3">
    <h2>Detail Tugas</h2>
    <br/>
    <u>Judul</u>
    <h4>{{$Task->judul}}</h4>
    <u>Deskripsi</u>
    <h4>{{$Task->deskripsi}}</h4>
    <br/>
    <u>Ditugaskan untuk anda</u>
    <table class="table">
        <thead class="table-primary">
        <tr>
            <th>id SubTask</th>
            <th>Judul SubTask</th>
            <th>Deskripsi</th>
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
                <td class="align-middle">{{$sub->deadline}}</td>
                <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">pick</button>
{{--                                                <button type="button" class="btn btn-primary">Middle</button>--}}
{{--                                                <button type="button" class="btn btn-primary">Right</button>--}}
                    </div>
                </td>
            </tr>
        @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Tidak ada sub task untuk anda</td>
            </tr>
        @endif
        </tbody>
    </table>


</div>
