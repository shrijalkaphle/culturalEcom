@extends('layout.frontend')
@section('title', $product->name)

@section('body')

<div class="container product-container mt-5">
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
        <div class="col-md-5" style="text-align:center">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($product->media as $media)
                            <li class="splide__slide">
                                <img src="{{ asset('uploads/'.$media->file) }}" style="width:80%">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-body shadow-lg">
                <h3>{{ $product->name }}</h3>
                <h5 class="mt-2">{{$product->nationality}}</h5>

                <p class="font-weight-normal h1 mt-5 text-primary">$ {{$product->cost}}</p>

                <hr>

                <form action="{{ route('cart.insert') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <label for="qty">Quantity </label>
                    <button type="button" id="sub2" class="sub btn font-weight-bold">-</button>
                    <input type="number" name="qty" id="2" value="1" min="1" max="5" class="text-center" style="border:0px; "/>
                    <button type="button" id="add2" class="add btn font-weight-bold">+</button>
                    
                    <button class="btn btn-success d-block addCart mt-3">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="container mt-4 shadow-lg card card-body">
        <h4>Product Details</h4>
        <p>{{ $product->description }}</p>
    </div>

</div>
@endsection

@section('script')
<script>
    var splide = new Splide( '.splide', {
        type            : 'loop',
        perPage         : 1,
        perMove         : 1,
        autoplay        : true,
        interval        : 3000,
        pauseOnHover    : true,
        arrows          : true,
        pagination      : true,
            } );
        splide.mount();

    $('.add').click(function () {
		if ($(this).prev().val() < 5) {
    	    $(this).prev().val(+$(this).prev().val() + 1);
		}
    });
    $('.sub').click(function () {
		if ($(this).next().val() > 1) {
            $(this).next().val(+$(this).next().val() - 1);
		}
    })
</script>
<style>
    .addCart {
        border-radius: 0px;
        width: 50%;
    }
    .card {
        border-radius: 0px;
    }
</style>
@endsection