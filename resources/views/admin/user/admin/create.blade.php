@extends('layout.admin')
@section('title','Create Admin')

@section('body')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div> Create Admin </div>
                </div>
            </div>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-transform: capitalize">
                <strong> <i class="fas fa-check-circle"></i></strong>
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-transform: capitalize">
                <strong> <i class="fas fa-check-circle"></i> </strong>
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 py-3 card card-body">
                    <form action="{{ route('admin.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="role_id" value="{{ $role->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="number">Phone Number</label>
                            <input type="number" name="number" id="number" required class="form-control">
                            @error('number') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" id="dob" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="dob">Gender</label>
                                <select name="gender" required id="gender" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" required class="form-control">
                                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control">
                            </div>
                        </div>

                        <center><button class="btn btn-primary w-50 my-4">Create</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#users').addClass('mm-active')
        $('#admin').addClass('mm-active')
        
    </script>
@endsection