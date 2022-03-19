@extends('layout.frontend')
@section('title', 'Product in ' . strtoupper($category->name))

@section('body')
<div class="header">
    <div class="bg-slider">
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($sliders as $slider)
                        <li class="splide__slide">
                            <img src="{{ asset('uploads/'.$slider->file) }}" class="img-fluid">
                        </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="bg-text">
        <div class="search-div">
            <h1>Culture at your DoorStep!!</h1>
            <form action="search" method="post" class="mt-5">
                <input type="search" name="search" id="search" class="search-input" placeholder="Search">
            </form>
        </div>
        <div class="mt-5">
            <h4>Categories</h4>
            <div class="d-flex flex-wrap mt-4">
                @foreach ($categories->take(16) as $category)
                    <div class="card p-3 bg-light flex-child justify-content-center align-items-center text-dark" onclick="findProductByCategory('{{$category->name}}')">
                        {{$category->display}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    
</div>

<div class="container mt-5">
    @if($products->isEmpty())
    <h4 class="mb-5">No Product Available!!</h4>
    @else
    <h4>Products</h4>
    @endif
    
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3 book-card">
                <div class="card">
                    <div class="view overlay">
                        <img class="img-fluid w-100" src="{{asset('uploads/'.$product->media->file)}}" style="height:300px">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 style="height:3em">{{$product->name}}</h5>
                        <p class="small text-muted text-uppercase mb-2">{{$product->nationality}}</p>
                        <h6 class="mb-3"><span class="text-danger mr-1">${{$product->cost}}</span></h6>
                        <form action="{{ route('cart.insert') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="qty" value="1">
                            <button class="btn btn-primary btn-sm mr-1 mb-2" @if($product->count == 0) disabled @endif>
                            <i class="fas fa-shopping-cart pr-2" aria-hidden="true"></i>Add to cart
                            </button>
                            <a type="button" class="btn btn-light btn-sm mr-1 mb-2" href="{{ route('view.product',$product->slug) }}">
                                <i class="fas fa-info-circle pr-2" aria-hidden="true"></i>Details
                            </a>
                        </form>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
    <script>
        function findProductByCategory(name)
        {
            window.location.href = "/category/"+name
        }
        var splide = new Splide( '.splide', {
            type            : 'loop',
            perPage         : 1,
            perMove         : 1,
            autoplay        : true,
            interval        : 7000,
            pauseOnHover    : true,
            arrows          : false,
            pagination      : true,
                } );
            splide.mount();
    </script>
@endsection