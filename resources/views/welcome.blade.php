@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1>Welcome to Our Website</h1>
            <div class="mt-5">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg mx-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-success btn-lg mx-2">Register</a>
            </div>
        </div>
    </div>
</div>
@endsection