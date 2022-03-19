@extends('layout.admin')
@section('title','Edit Product')

@section('body')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div> Edit Product </div>
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
                <div class="main-card mb-3 py-3 card w-50 mx-auto">
                    <div class="card-body">
                        <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" required placeholder="Product Name" class="form-control" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="display">Category</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif >{{ $category->display }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <input type="text" name="nationality" id="nationality" required placeholder="Product Nationality" class="form-control" value="{{ $product->nationality }}">
                            </div>
                            <div class="form-group">
                                <label for="count">Stock Count</label>
                                <input type="number" name="count" id="count" required placeholder="Product Stock Count" class="form-control" value="{{ $product->count }}">
                            </div>
                            <div class="form-group">
                                <label for="cost">Price ($)</label>
                                <input type="number" step="0.01" name="cost" id="cost" required placeholder="Product Price" class="form-control" value="{{ $product->cost }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" required placeholder="Product Description" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="image">Product Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('uploads/'.$product->media->file) }}" class="w-100">
                                </div>
                            </div>
                            <button class="btn btn-primary text-capitalize">update</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
    <script>
        $('#product').addClass('mm-active')
    </script>
@endsection