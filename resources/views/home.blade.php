@extends('master')

@section('title', 'Welcome')

@section('content')
<h1>Welcome to PPL Monev</h1>
<a href="{{url('/logout')}}">Logout</a>
@endsection