<tr>
    <td class="align-middle">{{$post->id}}</td>
    <td class="align-middle">{{$post->judul}}</td>
    <td class="align-middle">{{$post->deskripsi}}</td>
    <td class="align-middle">{{$post->created_at}}</td>
    <td class="align-middle">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{route('detail', $post->id_task)}}" class="btn btn-primary">details</a>
            {{--                        <button type="button" class="btn btn-primary">Middle</button>--}}
            {{--                        <button type="button" class="btn btn-primary">Right</button>--}}
        </div>
    </td>
</tr>
