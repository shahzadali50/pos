@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-12">
        <h2 class="page-title">Category Update</h2>
        <div class="card shadow mb-4">

            <div class="card-body">
                <form action="{{ route('category.updatedRecord', ['id' => $Category->id]) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Add Catogory</label>
                                <input type="text" name="category" class="form-control" value="{{ $Category->category }}" placeholder="Add Catogory" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1" {{ $Category->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $Category->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
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
