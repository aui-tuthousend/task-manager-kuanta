
@include('navbar')

<div class="container py-3">
    <form action="{{route('adds', $Task->id)}}" method="post">
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
            <input class="form-control" id="id_task" name="id_task" value="{{$Task->id}}" readonly>
        </div>

        <div class="form-group">
            <label for="jud_task">Judul Parent Task</label>
            <input class="form-control" id="jud_task" name="judul_task" value="{{$Task->judul}}" readonly>
        </div>
        <br/>

        <div class="form-group">
            <label for="Form1">Judul SubTask</label>
            <input class="form-control" id="Form1" name="judul" required>
        </div>


        <div class="form-group">
            <label for="Form2">Deskripsi SubTask</label>
            <textarea class="form-control" id="Form2" name="deskripsi" rows="2" required></textarea>
        </div>

        <label for="datepicker">Deadline</label>
        <br/>
        <input type="datetime-local" name="deadline" id="datepicker" required>


        <br/>
        <br/>
        <br/>

        <x-forms.button>Submit</x-forms.button>
    </form>
</div>



