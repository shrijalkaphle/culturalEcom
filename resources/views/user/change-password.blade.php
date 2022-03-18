@extends('layout.user')

@section('title', 'Change Password')

@section('main-content')
    <div class="card card-body shadow-lg">
        <form action="{{ route('user.updatepasword') }}" method="post" class="w-75">
            @csrf
            <div class="form-group">
                <label for="oldpassword">Old Password</label>
                <input type="password" name="oldpassword" id="oldpassword" class="form-control" required>
                @error('oldpassword') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control">
            </div>
            <button class="btn btn-primary w-100 text-uppercase">change password</button>
        </form>
        
    </div>
@endsection

@section('script-user')
    <script>
        $('#profile').addClass('active')
    </script>
    <style>
        .btn {
            border-radius: 0px
        }
    </style>
@endsection