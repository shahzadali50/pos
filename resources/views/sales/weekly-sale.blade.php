@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">

                        <span class="h2 mb-0">{{ $saleLast7Days }}</span>
                        <span>(PKR)</span>
                        <p class="small text-muted my-2">Weekly Sales</p>
                        <span class="badge badge-pill badge-success ">+62.1%</span>
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

    <div class="col-12 col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title mb-0">Weekly sales Bubble Chart</strong>
            </div>
            <div class="card-body">
                <div id="bubbleChart"></div>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>
@endsection
