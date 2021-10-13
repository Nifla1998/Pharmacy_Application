@extends('layouts.app')

@section('content')
<form method="post" action="/customer/save">
@csrf
    <input type="text" name="name" id="name">
     <input type="text" name="address" id="address">
     <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection