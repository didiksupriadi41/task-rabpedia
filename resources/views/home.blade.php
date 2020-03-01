@extends('master')

@section('title', 'Welcome')

@section('content')
<h1>Welcome to Home</h1>
<code>{{var_dump(Auth::user())}}</code>
@endsection