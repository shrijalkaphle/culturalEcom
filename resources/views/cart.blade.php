@extends('layout.frontend')
@section('title', 'Cart')

@section('body')
{{ $subtotal = null }}
<div class="container cart-container mt-5">
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show my-5" role="alert" style="text-transform: capitalize">
        <strong> <i class="fas fa-check-circle"></i></strong>
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show my-5" role="alert" style="text-transform: capitalize">
        <strong> <i class="fas fa-check-circle"></i></strong>
        {{ Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            @foreach (auth()->user()->cart as $cart)
                <div class="card shadow-lg product-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="{{ asset('uploads/'.$cart->product->media[0]->file) }}" style="width:100px">
                                            </div>
                                            <div class="col" style="padding-top:10px">
                                                <b><a href="{{ route('view.product',$cart->product->slug) }}">{{ $cart->product->name }}</a></b> <br>
                                                <small>{{ $cart->product->nationality }}</small>
                                                <br>
                                                <span style="color:red">${{ $cart->product->cost }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right qty-controller mt-3">
                                        <form action="{{ route('cart.update',$cart->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <input type="number" name="qty" id="qty" value="{{ $cart->qty }}" class="qty w-25">
                                            <button class="btn"><i class="fas fa-sync"></i></button>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                            <?php $subtotal = $subtotal + ($cart->qty * $cart->product->cost) ?>
                            <div class="col-2 text-right">
                                <button class="btn btn-text text-danger" type="button" data-toggle="modal" data-target="#deleteModel" class="delete-button" data-id="{{ $cart->id }}">
                                    <i class="fas fa-trash"></i>    
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg product-card">
                <div class="card-body">
                    <h5>Order Summery</h5>
                    <div class="row">
                        <div class="col">
                            Subtotal
                        </div>
                        <div class="col" style="text-align:right">
                            ${{$subtotal}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Shipping + Handling
                        </div>
                        <div class="col-3" style="text-align:right">
                            $10.00
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Sales Tax
                        </div>
                        <div class="col-3" style="text-align:right">
                            $5.00
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <b>Total</b>
                        </div>
                        <div class="col" style="text-align:right">
                            <b>${{$subtotal + 5 + 10}} </b>
                        </div>
                    </div>
                    <hr>
                    <form action="" method="post">
                        <button class="btn btn-primary w-100">Proceed to Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <style>
        .btn {
            border-radius: 0px
        }
    </style>
@endsection