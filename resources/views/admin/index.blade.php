@extends('admin.dashboard')
@section('title', 'Dashboard Page')
@section('content')
    <div class="page-content">

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white text-center">{{ $travel_package }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-home fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Travel</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $transaction }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dollar fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Transaction</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $transaction_pending }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-category fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Transaction Pending</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $transaction_success }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-check fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Transaction Success</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->




    </div>
@endsection
