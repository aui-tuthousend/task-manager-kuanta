@props([
    'type' => 'text', 'id', 'name', 'placeholder'
])

<div class="form-group">

    <input class="form-control"
           id="{{$id}}"
           type="{{$type}}"
           name="{{$name}}"
           placeholder="{{$placeholder}}">
</div>
