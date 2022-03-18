@extends('layout.user')

@section('title', 'Edit Profile')

@section('main-content')
    <div class="card card-body shadow-lg">
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
        <div class="row mb-5">
            <div class="col-md-4 mt-5">
                <small for="name" class="text-uppercase">name</small>
                <input type="text" name="name" id="name" required class="form-control" value="{{ auth()->user()->name }}">
            </div>
            <div class="col-md-4 mt-5">
                <small for="email" class="text-uppercase">email</small>
                <input type="email" name="email" id="email" required class="form-control" value="{{ auth()->user()->email }}">
            </div>
            <div class="col-md-4 mt-5">
                <small for="number" class="text-uppercase">number</small>
                <input type="number" name="number" id="number" required class="form-control" value="{{ auth()->user()->number }}">
            </div>
            <div class="col-md-4 mt-5">
                <small for="name" class="text-uppercase">gender</small>
                <select name="gender" id="gender" required class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="col-md-4 mt-5">
                <small for="dob" class="text-uppercase">date of birth</small>
                <input type="date" name="dob" id="dob" required class="form-control" value="{{ auth()->user()->dob }}">
            </div>
        </div>
        <hr class="my-5 ">
        <button class="btn btn-primary w-100 text-uppercase">update profile</button>
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