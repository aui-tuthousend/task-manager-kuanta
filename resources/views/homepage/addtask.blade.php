@include('navbar')
<div class="container py-3">
    <form action="{{ route('addtask') }}" method="POST">
            @csrf
            <label for="Form1">Judul</label>
             <x-forms.inputText name="judul" placeholder="Masukkan Judul Task" id="Form1"/>

            <label for="Form2">Deskripsi Task</label>
            <div class="form-group">
                <textarea class="form-control" name="deskripsi" id="Form2" rows="2"></textarea>
            </div>
        <br/>
        <div>SubTask & Tag Team</div>
        <x-forms.button>Submit task & tag team</x-forms.button>
    </form>

</div>
