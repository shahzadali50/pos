@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <h2 class="mb-2 page-title">All Orders </h2>

        <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table dataTable">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col" class="h5" style="color: #001a4e">Id</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Customer Name</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Phone No</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Disc</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Total</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $order )
                                    <tr>
                                        <th scope="row">{{$order->id }}</th>
                                        <td>{{$order->customer_name }}</td>
                                        <td>{{$order->customer_phone}}</td>
                                        <td>{{$order->disc}}</td>
                                        <td>{{$order->grand_total}}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('receipt',$order->id) }}">Receipt</a>
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
                        <form id="addStockForm" action="{{ route('add.stock') }}" method="POST">
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
