@extends('master')

@section('title', 'Welcome')

@section('content')
<h1>Welcome to Home</h1>
<a href="{{url('/logout')}}">Logout</a>
@endsection