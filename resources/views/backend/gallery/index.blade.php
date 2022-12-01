@extends('admin.dashboard')
@section('title')
    All Image Package
@endsection
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"> Image</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Image</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('image.create') }}" class="btn btn-primary">Add Image</a>
                </div>
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
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->travel->title }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->image) }}" width="180px" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('image.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('image.destroy', $item->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>

                                    </td>
                                </tr>
                            @empty
                                <td colspan="3" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Title</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
