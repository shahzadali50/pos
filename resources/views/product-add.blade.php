@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="page-title">Product Add</h2>
        <div class="card shadow mb-4">

            <div class="card-body">
                <form action=" {{ route('product.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">


                                <label for="Status">Product Category</label>
                                <select name="category_id" class="form-control" id="Status">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Status">Product Brand</label>
                                <select name="brand_id" class="form-control" id="Status">
                                    <option  selected disabled>Select Brand</option>
                                    @foreach ($brand as $brand_name  )
                                    <option value="{{ $brand_name->id }}">{{$brand_name->brand }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Product Code</label>
                                <input name="code" type="text" name="" class="form-control" placeholder="Product Code" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Quantity</label>
                                <input name="quantity" type="number" name="" class="form-control" placeholder="Quantity" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Purchase Rate</label>
                                <input name="purchase_rate" type="number" name="" class="form-control" placeholder="Purchase Rate" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Sale Rate</label>
                                <input name="sale_rate" type="number" name="" class="form-control" placeholder="Sales Rate" required>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <label for="simpleinput">Drop files here, paste or browse</label>
                            <input name="photo" type="file" class="form-control mb-3"  accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                        </div>
                        <div class="col-12">
                            <button type="reset" class="btn mb-2 btn-warning">Reset</button>
                            <button type="submit" class="btn mb-2 btn-info">Add Catogory</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


