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
                                        <th scope="row">{{$product_list->id }}</th>
                                        <td>{{$product_list->name }}</td>
                                        <td>{{$product_list->category->name}}</td>
                                        <td>{{$product_list->brand->name}}</td>
                                        <td>{{$product_list->code}}</td>
                                        <td>{{$product_list->quantity}}</td>
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
                                                <a href="{{ route('product.stock',[$product_list->id]) }}" class="btn btn-light dropdown-item" id="stock">
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
                        <h5 class="text-secondary">{{$product->name }}</</h5>
                    </div>
                    <div class="col-md-6">
                        <form action="">

                            <div class="form-group mb-3">
                                <label for="simpleinput">Add Stock</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Add Stock" required>
                                <button class="btn mt-2 btn-info">Add</button>
                            </div>
                        </form>



                    </div>
                </div>

            </div>
            {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div> --}}
        </div>
    </div>
</div @endsection
