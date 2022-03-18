@extends('layout.user')

@section('title', 'My Profile')

@section('main-content')
    <div class="card card-body shadow-lg">
        <div class="row mb-5">
            <div class="col-md-4 mt-5">
                <small for="name" class="text-uppercase">name</small>
                <p class="h6 mt-2">{{ auth()->user()->name }}</p>
            </div>
            <div class="col-md-4 mt-5">
                <small for="name" class="text-uppercase">email</small>
                <p class="h6 mt-2">{{ auth()->user()->email }}</p>
            </div>
            <div class="col-md-4 mt-5">
                <small for="name" class="text-uppercase">number</small>
                <p class="h6 mt-2">{{ auth()->user()->number }}</p>
            </div>
            <div class="col-md-4 mt-5">
                <small for="name" class="text-uppercase">gender</small>
                @if(auth()->user()->gender)
                    <p class="h6 mt-2 text-capitalize">{{ auth()->user()->gender }}</p>
                @else
                    <p class="h6 mt-2">N.A</p>
                @endif
            </div>
            <div class="col-md-4 mt-5">
                <small for="name" class="text-uppercase">date of birth</small>
                @if(auth()->user()->dob)
                    <p class="h6 mt-2">{{ date('M j, Y', strtotime(auth()->user()->dob)) }}</p>
                @else
                    <p class="h6 mt-2">N.A</p>
                @endif
            </div>
        </div>
        <hr class="my-5 ">
        <div class="row mt-5">
            <div class="col-md-6">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary w-100 text-uppercase">Edit profile</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('user.changepassword') }}" class="btn btn-primary w-100 text-uppercase">change password</a>
            </div>
        </div>
        
        
    </div>
@endsection

@section('script-user')
    <script>
        $('#profile').addClass('active')
    </script>
    <style>
        .btn {
            border-radius: 0px;
            font-weight: 600
        }
    </style>
@endsection