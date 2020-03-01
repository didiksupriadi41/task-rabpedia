@extends('master')

@section('title', 'Welcome')

@section('content')
<div class="login-container d-flex align-items-center">
    <div class="login-box">
        <h1 class="h3 mb-3 font-weight-normal">Welcome to RABPEDIA</h1>
        <a href="{{url('/login-form')}}" class="btn btn-lg btn-primary btn-block">Sign in with SSO ITB</a>
        <p class="my-3 text-muted">&copy; 2020</p>
    </div>
</div>
@endsection