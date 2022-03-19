@extends('layout.frontend')
@section('title', 'Cart')

@section('body')
<?php $subtotal = 0 ?>
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
                                <button class="btn btn-text text-danger delete-toggle" type="button" data-toggle="modal" data-target="#deleteCartItem" data-id="{{ $cart->id }}">
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
                            <b>Total</b>
                        </div>
                        <div class="col" style="text-align:right">
                            <b>${{$subtotal}} </b>
                        </div>
                    </div>
                    <hr>
                    <form action="{{ route('payment') }}" method="post">
                        @csrf
                        <input type="hidden" name="totalAmount" value="{{ $subtotal }}">
                        <button class="btn btn-primary w-100">Proceed to Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<div class="modal fade" id="deleteCartItem" tabindex="-1" role="dialog" aria-labelledby="Delete Cart Items" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCartItemTitle"><i class="fas fa-info-circle" style="color:red"></i> Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="deleteForm" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Are You Sure Want to Delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <style>
        .btn {
            border-radius: 0px
        }
    </style>
    <script>
        $(document).on("click", ".delete-toggle", function() {
            var id = $(this).data('id')
            var action = 'cart/'+id
            $('#deleteCartItem #deleteForm').attr("action", action)
        })
    </script>
@endsection