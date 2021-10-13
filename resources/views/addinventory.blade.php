@extends('layouts.app')

@section('content')
<form method="post" action="/inventory/save">
@csrf
    <input type="text" name="name" id="name">
     <input type="text" name="price" id="price">
     <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection