
@include('navbar')
@php
    $id = session('task')->getAttribute('id');
@endphp
<div class="container py-3">
    <form action="{{route('addsubtask', $id)}}" method="POST">
        @csrf
        <div class="form-group">

            <label for="select">Select Team</label>
            <select class="form-control" id="select" name="selected_user">
                @foreach($users as $user)
                    @if($user->role != 'admin')
                        <option value="{{$user->id}}">{{$user->role}} - {{$user->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <br/>

        <div class="form-group">
            <label for="id_task">id Parent Task</label>
            <input class="form-control" id="id_task" name="id_task" value="{{$id}}" readonly>
        </div>

        <div class="form-group">
            <label for="jud_task">Judul Parent Task</label>
            <input class="form-control" id="jud_task" name="judul_task" value="{{session('task')->judul}}" readonly>
        </div>
        <br/>

        <label for="Form1">Judul SubTask</label>
        <x-forms.inputText name="judul" placeholder="Masukkan Judul SubTask" id="Form1"/>

        <label for="Form2">Deskripsi SubTask</label>
{{--        <x-forms.inputText name="deskripsi" placeholder="Masukkan Deskripsi SubTask" id="Form2"/>--}}

        <div class="form-group">
            <textarea class="form-control" id="Form2" name="deskripsi" rows="2"></textarea>
        </div>
        <label for="datepicker">Deadline</label>
        <br/>
        <input type="datetime-local" name="deadline" id="datepicker">

        <br/>
        <br/>
        <br/>

        <x-forms.button>Submit</x-forms.button>
    </form>
</div>



