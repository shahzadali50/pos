@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="mb-2 page-title">Category List</h2>

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
                                        <th scope="col" class="h5" style="color: #001a4e">Brand Name</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Staus</th>
                                        <th scope="col" class="h5" style="color: #001a4e">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brand as $brand_list )
                                    <tr>
                                        <th scope="row">{{$brand_list->id }}</th>
                                        <td>{{$brand_list->brand}}</td>
                                        <td>{{$brand_list->status}}</td>
                                        <td>
                                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('brand.edit',$brand_list->id) }}" class="btn btn-light dropdown-item">Update</a>
                                                <form action="{{ route('brand.delete',['id'=>$brand_list->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                  

                                                    <button type="submit" class="btn btn-light dropdown-item text-danger" >Delete</button>
                                                </form>
            
                                            </div>
                                        </td>

                                    </tr>

                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div> <!-- simple table -->
        </div> <!-- end section -->
    </div>
</div>
@endsection
