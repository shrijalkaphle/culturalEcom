@extends('layout.frontend')
@section('title', env('APP_NAME'))

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
            <form action="{{ route('search') }}" method="post" id="search-form" class="mt-5">
                @csrf
                <input type="search" name="search" id="search" class="search-input" placeholder="Search" value="@isset($query) {{$query}} @endisset">
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
    <h4>Products</h4>
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
    <style>
        .header {
            height: calc(100vh - 80px);
            overflow: hidden;
            position: relative;
        }
        .bg-slider {
            height: calc(100vh - 80px);
            overflow: hidden;
        }
        .splide__slide img {
            max-height: calc(100vh - 80px);
            min-width: 100%;
            object-fit: cover;
            object-position: center center;
        }
        .bg-text {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.3);
            color: whitesmoke;
            font-weight: bold;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: 2;
        }
        .flex-child {
            border-radius: 0;
            flex: 1 0 12%;
            height: 100px;
            background-color: blue;
            cursor: pointer;
        }
        .flex-child:hover {
            transform: scale(1.05);
            z-index: 999;
        }
    </style>
@endsection