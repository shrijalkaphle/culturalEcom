@extends('layout.user')

@section('title', 'My Orders')

@section('main-content')
    <div class="card card-body shadow-lg">
        <h4>Order History</h4>
        @foreach (auth()->user()->orderHistory as $history)
        
        <div class="card card-body border">
            <div class="row">
                <div class="col font-weight-bold">
                    ORDER #{{$history->id}}
                </div>
                <div class="col text-right">
                    <a href="{{ $history->recept_url }}" target="_blank" rel="noopener noreferrer">View Recipt</a>
                </div>
            </div>
            <hr>
            <div>
                @foreach ($history->items as $item)
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <img src="{{ asset('uploads/'.$item->product->media->file) }}" class="w-100">
                        </div>
                        <div class="col-md-6">
                            <h5>{{$item->product->name}}</h5>
                            <small class="d-block">{{$item->product->nationality}}</small>
                            <h6 class="text-primary">${{$item->product->cost}}</h6>
                        </div>
                        <div class="col-md-2 text-center">
                            {{$item->qty}}
                        </div>
                        <div class="col-md-2 text-right font-weight-bold">
                            ${{ $item->qty * $item->product->cost }}
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
        <hr class="my-3">
        @endforeach
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