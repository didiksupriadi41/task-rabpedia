@extends('master')

@section('title', 'Welcome')

@section('content')
<h1>Welcome to Home</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-outline-danger">Logout</button>
</form>
@endsection