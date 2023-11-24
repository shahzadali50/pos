<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="page-title">Product Update</h2>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $product->name }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Status">Category</label>
                                <select name="category_id" class="form-control" id="Status" required>
                                    <option disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Status">Brand</label>
                                <select name="brand_id" class="form-control" id="Status" required>
                                    <option disabled>Select Brand</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Code</label>
                                <input name="code" value="{{ $product->code }}" type="number" class="form-control" placeholder="Code" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Quantity</label>
                                <input readonly name="quantity" value="{{ $product->quantity }}" type="number" class="form-control" placeholder="Quantity" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Purchase Rate</label>
                                <input name="purchase_rate" value="{{ $product->purchase_rate }}" type="number" class="form-control" placeholder="Purchase Rate" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Sale Rate</label>
                                <input name="sale_rate" value="{{ $product->sale_rate }}" type="number" class="form-control" placeholder="Sales Rate" required>
                            </div>

                        </div>
                          <div class="col-md-6">
                            <label for="simpleinput">Drop files here, paste or browse</label>
                            <input name="photo" type="file" class="form-control mb-3" accept="image/*">
                            @if($product->photo)
                            <p>Previous Photo:</p>
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" style="max-width: 100px; max-height: 100px;">
                            @else
                            <p>No photo available</p>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea name="description" value="{{ $product->description }}" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-12">

                            <button type="submit" class="btn mb-2 btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
