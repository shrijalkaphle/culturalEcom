@extends('layout.admin')
@section('title','Product List')

@section('body')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div> Product List </div>
                </div>
                <div class="page-title-actions">
                    <a type="button" class="btn-shadow mr-3 btn btn-dark" href="{{ route('products.create') }}">
                        <i class="fa fa-plus"></i> Add
                    </a>
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
                <div class="main-card mb-3 py-3 card ">
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Nationality</th>
                                <th class="text-center">In Stock</th>
                                <th class="text-center">Price</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $product->name }}</td>
                                        <td class="text-center">{{ $product->category->display }}</td>
                                        <td class="text-center">{{ $product->nationality }}</td>
                                        <td class="text-center">{{ $product->count }}</td>
                                        <td class="text-center">${{ $product->cost }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-info text-capitalize">edit</a>
                                            <button class="btn btn-danger text-capitalize delete-toggle" data-toggle="modal" data-id="{{$product->id}}" data-target="#deleteProduct">delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="Delete Party" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoleTitle"><i class="fas fa-info-circle" style="color:red"></i> Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
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
    <script>
        $('#product').addClass('mm-active')
        $(document).on("click", ".delete-toggle", function() {
            var id = $(this).data('id')
            var action = 'products/'+id
            $('#deleteProduct #deleteForm').attr("action", action)
        })
    </script>
@endsection