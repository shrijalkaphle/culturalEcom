@extends('layout.frontend')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <ul>
                            <h5>Manage My Profile</h5>
                            <li id="profile"><a href="{{route('user.profile')}}" class="side-link ">My Profile</a></li>
                            <h5 class="mt-3">Orders</h5>
                            <li id="orderhistory"><a href="{{ route('user.order') }}" class="side-link">Order History</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @yield('main-content')
            </div>
        </div>
    </div>
@endsection

@section('script')
    @yield('script-user')
    <style>
        .card ul {
            list-style-type: none;
            padding: 0;
            margin: 0
        }
        .card ul li {
            margin-left: 20px;
            margin-top:7px
        }
        .side-link {
            color: gray;
            text-decoration: none;
        }
        .side-link:hover {
            color: black;
            text-decoration: none
        }
        .active a {
            font-weight: 600;
            color: black
        }
    </style>
@endsection

