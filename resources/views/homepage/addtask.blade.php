@include('navbar')
<div class="container py-3">
    <form action="{{ route('addtask') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Form1">Judul</label>
                <input class="form-control" name="judul" id="Form1" placeholder="Masukkan judul task">
            </div>

            <div class="form-group">
                <label for="Form2">Deskripsi Task</label>
                <textarea class="form-control" name="deskripsi" id="Form2" rows="2"></textarea>
            </div>
        <div>SubTask & Tag Team</div>
        <table class="table">
            <thead class="table-primary">
            <tr>
                <th>id subtask</th>
                <th>Judul</th>
                <th>tagged id user</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($subtasks as $sub)
                    <tr>
                        <td class="align-middle">{{$sub->id}}</td>
                        <td class="align-middle">{{$sub->judul}}</td>
                        <td class="align-middle">{{$sub->id_user}}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-danger">delete</button>
                                {{--                        <button type="button" class="btn btn-primary">Middle</button>--}}
                                {{--                        <button type="button" class="btn btn-primary">Right</button>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href='/addtask/addsubtask' class="btn btn-primary">Tag Team +</a>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

        <button class="btn btn-primary">Submit Task</button>
    </form>


</div>
