@extends('admin.dashboard')
@section('title')
    Detail {{ $item->user->name }}
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
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>
                    <tr>
                        <th>Paket Travel</th>
                        <td>{{ $item->travel->title }}</td>
                    </tr>
                    <tr>
                        <th>Pembeli</th>
                        <td>{{ $item->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Additional Visa</th>
                        <td>$0{{ $item->additional_visa }}</td>
                    </tr>
                    <tr>
                        <th>Total Transaksi</th>
                        <td>${{ $item->transaction_total }}</td>
                    </tr>
                    <tr>
                        <th>Status Transaksi</th>
                        <td>{{ $item->transaction_status }}</td>
                    </tr>
                    <tr>
                        <th>Pembelian</th>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Nationality</th>
                                    <th>Visa</th>
                                    <th>SALL Passport</th>
                                </tr>
                                @foreach ($item->details as $detail)
                                    <tr>
                                        <td>{{ $detail->id }}</td>
                                        <td>{{ $detail->username }}</td>
                                        <td>{{ $detail->nationality }}</td>
                                        <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                        <td>{{ $detail->passport }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
