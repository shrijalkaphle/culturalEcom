@extends('layout.user')

@section('title', 'My Orders')

@section('main-content')
    <div class="card card-body shadow-lg">
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <th class="text-center">Order ID</th>
                    <th class="text-center">Order Placed Date</th>
                    <th class="text-center">Status</th>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('script-user')
    <script>
        $('#orderhistory').addClass('active')
    </script>
    <style>
        .btn {
            border-radius: 0px;
            font-weight: 600
        }
    </style>
@endsection