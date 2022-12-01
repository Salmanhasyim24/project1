@extends('admin.dashboard')
@section('title')
    Edit Transaction
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
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('transaction.update', $item->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <div class="form-group">
                        <label for="title">Status</label>
                        <select name="transaction_status" required class="form-control">
                            <option value="{{ $item->transaction_status }}">Jangan Diganti ({{ $item->transaction_status }})
                            </option>
                            <option value="in_cart">In Cart</option>
                            <option value="pending">Pending</option>
                            <option value="success">Success</option>
                            <option value="cancel">Cancel</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
