@extends('admin.dashboard')
@section('title')
    All Transaction Package
@endsection
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"> Travel</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Travel</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Travel</th>
                                <th>User</th>
                                <th>Visa</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->travel->title }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>${{ $item->additional_visa }}</td>
                                    <td>${{ $item->transaction_total }}</td>
                                    <td>{{ $item->transaction_status }}</td>
                                    <td>
                                        <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('transaction.destroy', $item->id) }}" class="btn btn-danger"
                                            id="delete"> <i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            @empty
                                <td colspan="10" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Travel</th>
                                <th>User</th>
                                <th>Visa</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
