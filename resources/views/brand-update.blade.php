@extends('app')
@section('content')
<div class="row">
    <div class="col-md-8 col-12">
        <h2 class="page-title">Brand Update</h2>
        <div class="card shadow mb-4">

            <div class="card-body">
                <form action="{{ route('brand.update',$Brand->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Add Brand</label>
                                <input type="text" value="{{ $Brand->brand }}" name="brand" class="form-control" placeholder="Add Brand" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Status">Status</label>
                                <select name="status" class="form-control" id="Status">
                                    <option value="1" {{ $Brand->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $Brand->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="reset" class="btn mb-2 btn-warning">Reset</button>
                            <button type="submit" class="btn mb-2 btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

