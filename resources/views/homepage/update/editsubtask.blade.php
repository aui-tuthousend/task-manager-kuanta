
@include('navbar')

<div class="container py-3">
    <form action="{{route('editStore', $Task->id)}}" method="post">
        @csrf
        <div class="form-group">

            <label for="select">Select Team</label>
            <select class="form-control" id="select" name="selected_user">
                <option value="{{$Task->id_user}}">{{$Task->user_name}}</option>
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
            <input class="form-control" id="id_task" name="id_task" value="{{$Task->id_task}}" readonly>
        </div>

        <div class="form-group">
            <label for="jud_task">Judul Parent Task</label>
            <input class="form-control" id="jud_task" name="judul_task" value="{{$Task->judul_task}}" readonly>
        </div>
        <br/>

        <div class="form-group">
             <label for="Form1">Judul SubTask</label>
            <input class="form-control" id="Form1" name="judul" value="{{$Task->judul}}">
        </div>


        <div class="form-group">
        <label for="Form2">Deskripsi SubTask</label>
            <input class="form-control" id="Form2" name="deskripsi" value="{{$Task->deskripsi}}"></input>
        </div>
        <label for="datepicker">Deadline</label>
        <br/>
        <input type="datetime-local" name="deadline" id="datepicker" value="{{$Task->deadline}}">

        <br/>
        <br/>
        <br/>

        <x-forms.button>Submit</x-forms.button>
    </form>
</div>






