@extends('layout.admin')
@section('title','Order List')

@section('body')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div> Order List </div>
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
                                <th class="text-center">Product</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Unit Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center">{{ $order->product->name }}</td>
                                        <td class="text-center">{{ $order->product->category->display }}</td>
                                        <td class="text-center">{{ $order->product->cost }}</td>
                                        <td class="text-center">{{ $order->qty }}</td>
                                        <td class="text-center">${{ $order->product->cost * $order->qty }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer">
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#order').addClass('mm-active')
        $(document).on("click", ".delete-toggle", function() {
            var id = $(this).data('id')
            var action = 'products/'+id
            $('#deleteProduct #deleteForm').attr("action", action)
        })
    </script>
@endsection