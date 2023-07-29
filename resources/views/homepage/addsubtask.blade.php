@include('navbar')
<div class="container py-3">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Select Team</label>
        <select class="form-control" id="exampleFormControlSelect1">
            @foreach($users as $user)
            <option>{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <br/>
    <div class="form-group">
        <label for="Form1">Judul SubTask</label>
        <input class="form-control" id="Form1" placeholder="Masukkan judul subtask">
    </div>
    <div class="form-group">
        <label for="Form2">Deskripsi SubTask</label>
        <textarea class="form-control" id="Form2" rows="2"></textarea>
    </div>

</div>
