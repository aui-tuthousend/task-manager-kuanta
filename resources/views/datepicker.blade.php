<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "dd-mm-yy H:i",
                changeMonth: true,
                changeYear: true,
                buttonText:"date"
            });

        } );
    </script>
</head>
<body>
@include('navbar')
<div class="container py-3">

    <form action="{{route('addsubtask')}}" method="POST">
        @csrf
        <div class="form-group">

            <label for="select">Select Team</label>
            <select class="form-control" id="select" name="selected_user">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <br/>
        <div class="form-group">
            <label for="Form1">Judul SubTask</label>
            <input class="form-control" id="Form1" name="judul" placeholder="Masukkan judul subtask">
        </div>
        <div class="form-group">
            <label for="Form2">Deskripsi SubTask</label>
            <textarea class="form-control" id="Form2" name="deskripsi" rows="2"></textarea>
        </div>
            <label for="datepicker">Deadline</label>
            <br/>
            <input type="text" name="deadline" id="datepicker">

        <br/>
        <br/>
        <br/>

        <button class="btn btn-primary">Submit</button>
    </form>
</div>





</body>
</html>
