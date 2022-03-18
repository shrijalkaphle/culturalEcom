@extends('layout.frontend')
@section('title', 'Login')

@section('body')
<div class="container">
    <div class="login-div">
        <form action="{{ route('user.login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email Address <span style="color:red">*</span></label>
                <input type="email" name="email" id="email" required="" class="form-control">
                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="password">Password <span style="color:red">*</span></label>
                <input type="password" name="password" id="password" required="" class="form-control">
                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button class="btn btn-success" style="width:100%">Sign In</button>
        </form>
    </div>
</div>
@endsection


