@include('navbar')

@foreach($subtasks as $sub)
    {{$sub->judul}}
@endforeach
