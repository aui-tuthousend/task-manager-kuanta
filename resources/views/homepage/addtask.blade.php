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
        <button type="submit" class="btn btn-primary">Submit task & tag team</button>
{{--        <a href='/addtask/addsubtask' class="btn btn-primary">Submit task & tag team</a>--}}
    </form>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

{{--            <a href='/team' class="btn btn-primary">Save Task</a>--}}

{{--        <button class="btn btn-primary">Save Task</button>--}}


</div>
