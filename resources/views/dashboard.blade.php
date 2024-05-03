@extends('layouts/app')

@section('content')
<div class="row">
    {{-- total sales --}}
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <span class="h2 mb-0">{{ $totalSale }}</span>
                        <span>(PKR)</span>

                        <p class="small text-muted mb-2 mt-1 text-uppercase">Total Sales</p>
                        <span class="badge badge-pill badge-success">+15.5%</span>
                    </div>
                    <div class="col-auto">
                        <span class="circle circle-lg bg-primary">
                            <i class="fe fe-32 fe-shopping-bag text-white mb-0"></i>
                        </span>
                        {{-- <span class="fe fe-32 fe-shopping-bag text-muted mb-0"></span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- total Order --}}
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <span class="h2 mb-0">{{ $totalOrders }}</span>

                        <p class="small text-muted mb-2 mt-1 text-uppercase">Total Orders</p>
                        <span class="badge badge-pill badge-primary">+40.5%</span>
                    </div>
                    <div class="col-auto">
                        <span class="circle circle-lg bg-primary">
                            <i class="fe h3 fe-16 fe-shopping-cart text-white mb-0"></i>
                        </span>
                        {{-- <span class="fe fe-32 fe-shopping-bag text-muted mb-0"></span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- brand --}}
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <span class="h2 mb-0">{{ $totalBrand }}</span>

                        <p class="small text-muted mb-2 mt-1 text-uppercase">Total brand</p>
                        <span class="badge badge-pill badge-warning">+18.2%</span>
                    </div>
                    <div class="col-auto">
                        <span class="circle circle-lg bg-primary d-flex justify-content-center">
                            <i class=" h3 fa fa-bookmark-o text-white mb-0"></i>
                        </span>
                        {{-- <span class="fe fe-32 fe-shopping-bag text-muted mb-0"></span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- items --}}
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <span class="h2 mb-0">{{ $totalItems }}</span>

                        <p class="small text-muted mb-2 mt-1 text-uppercase">Total items</p>
                        <span class="badge badge-pill badge-info">+60.7%</span>
                    </div>
                    <div class="col-auto">
                        <span class="circle circle-lg bg-primary d-flex justify-content-center">
                            <i class='h3 bx bx-pulse text-white mb-0'></i>
                            {{-- <i class='bx bx-pulse'></i> --}}

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- category --}}
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <span class="h2 mb-0">{{ $totalcategory }}</span>

                        <p class="small text-muted mb-2 mt-1 text-uppercase">Total categories</p>
                        <span class="badge badge-pill badge-danger">+10.9%</span>
                    </div>
                    <div class="col-auto">
                        <span class="circle circle-lg bg-primary d-flex justify-content-center">
                            <i class=' h3 bx bx-category-alt text-white mb-0' ></i>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- today sale --}}
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <span class="h2 mb-0">{{ $toDaysSale }}</span>
                        <span>(PKR)</span>

                        <p class="small text-muted mb-2 mt-1 text-uppercase">today sales</p>
                        <span class="badge badge-pill badge-success">+17.9%</span>
                    </div>
                    <div class="col-auto">
                        <span class="circle circle-lg bg-primary d-flex justify-content-center">

                            <i class=' h3 bx bxl-pocket text-white mb-0' ></i>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title mb-0">POS Chart</strong>
            </div>
            <div class="card-body">
                <div id="heatmapChart"></div>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>


@endsection
