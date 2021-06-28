@extends('welcome')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span>{{ $categories }}</span>
                                <p class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a
                                        href="{{ url('categories') }}">See More</a></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span>{{ $products }}</span>
                                <p class="text-xs font-weight-bold text-success text-uppercase mb-1"><a
                                        href="{{ url('products') }}">See More</a></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fab fa-product-hunt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Customers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span>{{ $customers }}</span>
                                <p class="text-xs font-weight-bold text-success text-uppercase mb-1"><a
                                        href="{{ url('customers') }}">See More</a></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>




@endsection
