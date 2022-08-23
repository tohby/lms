@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="mb-5">
            <h4 class="text-muted hello">Hello {{ Auth::user()->name }}</h4>
            {{-- <br> --}}
            <h2 class="greeting">Have a good day <span>&#128077;</span></h2>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-lg-6 col-xl mb-3">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted mb-2 h6">
                                    New Orders
                                </h6>
                                <span class="h2 mb-0">
                                    15
                                </span>
                            </div>
                            <div class="col-auto">
                                <span class="h2 text-muted mb-0">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl mb-3">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted mb-2 h6">
                                    Products
                                </h6>
                                <span class="h2 mb-0">
                                    9
                                </span>
                            </div>
                            <div class="col-auto">
                                <span class="h2 text-muted mb-0">
                                    <i class="fas fa-folder"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl mb-3">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted mb-2 h6">
                                    Customers
                                </h6>
                                <span class="h2 mb-0">
                                    6
                                </span>
                            </div>
                            <div class="col-auto">
                                <span class="h2 text-muted mb-0">
                                    <i class="fas fa-users"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
