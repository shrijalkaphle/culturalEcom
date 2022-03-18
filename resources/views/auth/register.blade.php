@extends('layout.frontend')
@section('title', 'Register')

@section('body')
<div class="container">
    <div class="register-div">
        <form action="{{ route('user.register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name <span style="color:red">*</span></label>
                <input type="text" name="name" id="name" placeholder="Full Name" class="form-control">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="email">Email Address <span style="color:red">*</span></label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="number">Contact Number <span style="color:red">*</span></label>
                <input type="number" name="number" id="number" placeholder="Contact Number"class="form-control" onkeypress="if(this.value.length==10) return false;">
                @error('number') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="password">Password <span style="color:red">*</span></label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password <span style="color:red">*</span></label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control">
            </div>
            <button class="btn btn-success" style="width:100%">Register</button>
        </form>
    </div>
</div>
@endsection