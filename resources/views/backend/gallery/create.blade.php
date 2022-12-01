@extends('admin.dashboard')
@section('title')
    Create Travel Package
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Travel Gallery </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Travel Name</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <form id="myForm" method="post" action="{{ route('image.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="inputCollection" class="form-label">Select Travel</label>
                                        <select name="travel_id" class="form-select" id="js-example-basic-single">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($travel as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">photo</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="image" class="form-control" id="image" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label class="form-label">Update Photo</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage"
                                                src="{{ !empty($data->image) ? url('upload/' . $data->image) : url('upload/no_image.jpg') }}"
                                                alt="Admin" style="width:100px; height: 100px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-12 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    travel_id: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                },
                messages: {
                    travel_id: {
                        required: 'Please Enter Product Name',
                    },
                    image: {
                        required: 'Please Select Product Thambnail Image',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#js-example-basic-single').select2();
        });
    </script>
@endsection
