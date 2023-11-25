@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <h2 class="mb-2 page-title">Products List</h2>

        <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table dataTable">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col" class="h5" style="color: #001a4e">#</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Name</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Category</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Brand</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Code</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Quantity</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Purchase Rate</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Sale Rate</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Description</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Photo</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product_list )
                                    <tr>
                                        <th scope="row" >{{$product_list->id }}</th>
                                        <td>{{$product_list->name }}</td>
                                        <td>{{$product_list->category->name}}</td>
                                        <td>{{$product_list->brand->name}}</td>
                                        <td>{{$product_list->code}}</td>
                                        <td data-product-id="{{$product_list->id}}">{{$product_list->quantity}}</td>
                                        <td>{{$product_list->purchase_rate}}</td>
                                        <td>{{$product_list->sale_rate}}</td>
                                        <td>{{$product_list->description}}</td>
                                        <td>
                                            @if($product_list->photo)
                                            <img src="{{ asset('storage/' . $product_list->photo) }}" alt="Product Photo" style="max-width: 90px; max-height: 90px;">
                                            @else
                                            No Photo
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('product.edit',['id'=>$product_list->id]) }}" class="btn btn-light dropdown-item">Update</a>
                                                <form action="{{ route('product.delete',['id'=>$product_list->id]) }}" method="POST">
                                                     @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light dropdown-item text-danger">Delete</button>
                                                </form>
                                                <a href="#" onclick="addStock(`{{$product_list->name}}`,`{{ $product_list->id }}`)" class="btn btn-light dropdown-item">
                                                    Add Stock
                                                </a>

                                            </div>
                                        </td>

                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">

                        <h5> Product Name </h5>
                        <h5 class="text-secondary" id="pro_name"> </h5>

                    </div>
                    <div class="col-md-6">
                        <form id="addStockForm"  action="{{ route('add.stock') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <input type="text" name="product_id" id="pro_id" value="" hidden>
                                <label for="simpleinput">Add Stock</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Add Stock" required>
                                <button id="submitForm" type="submit" class="btn mt-2 btn-info">Add</button>
                            </div>
                        </form>



                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
 @endsection


@push('js')
<style>
    .flashy {
        position: fixed;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #4CAF50;
        color: white;
        padding: 15px;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

</style>
<script>
    function addStock(name,id){
        $('#pro_name').text(name);
        $('#pro_id').val(id);
        $('#staticBackdrop').modal('show');
      }
    //   showFlashMessage
      function showFlashMessage() {
        // Create a div element for the flash message
        var flashMessage = $('<div>').addClass('flashy').text('Stock updated');

        // Append the flash message to the body
        $('body').append(flashMessage);

        // Remove the flash message after a delay (e.g., 3 seconds)
        setTimeout(function() {
            flashMessage.remove();
        }, 3000);
    }
</script>
    <script>

        $('#submitForm').click(function(e) {
            var formData = $('#addStockForm').serialize();
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $('#addStockForm').attr('action'),
                data: formData,
                success: function(response) {
                    if (response.success) {

                        $('td[data-product-id="' + response.id + '"]').text(response.stock);
                        $('#staticBackdrop').modal('hide');
                        showFlashMessage();

                    } else {
                        // Show an error message
                        alert('Error: ' + response.error);
                    }
                },
                error: function(error) {
                    // Handle AJAX errors
                    console.error('AJAX request failed:', error);
                }
            });
        });
    </script>
@endpush
