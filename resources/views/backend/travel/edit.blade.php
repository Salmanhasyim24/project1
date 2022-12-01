@extends('admin.dashboard')
@section('title')
    Edit Travel Package
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Travel </div>
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

                                <form id="myForm" method="post" action="{{ route('travel.update', $item->id) }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" value="{{ $item->title }}"
                                            class="form-control" id="inputProductTitle" placeholder="Enter Travel title">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="location" class="form-label">Location Travel</label>
                                        <input type="text" name="location" value="{{ $item->location }}"
                                            class="form-control" id="inputProductTitle"
                                            placeholder="Enter location for travel">
                                    </div>
                                    <div class="mb-3">
                                        <label for="about" class="form-label">About Travel</label>
                                        <textarea id="mytextarea" name="about">{{ $item->about }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="featured_event" class="form-label">Featured Event</label>
                                        <input type="text" name="featured_event" value="{{ $item->featured_event }}"
                                            class="form-control" id="inputProductTitle" placeholder="Enter Event title">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="language" class="form-label">Language</label>
                                        <input type="text" name="language" value="{{ $item->language }}"
                                            class="form-control" id="inputProductTitle" placeholder="Enter the Language">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="foods" class="form-label">Foods</label>
                                        <input type="text" name="foods" value="{{ $item->foods }}"
                                            class="form-control" id="inputProductTitle" placeholder="Enter foods">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="departure_date" class="form-label">Departure Date</label>
                                        <input type="date" disabled name="departure_date"
                                            value="{{ $item->departure_date }}" class="form-control" id="inputProductTitle"
                                            placeholder="Enter departure_date">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="duration" class="form-label">Duration</label>
                                        <input type="text" name="duration" value="{{ $item->duration }}"
                                            class="form-control" id="inputProductTitle" placeholder="Enter departure_date">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="type" class="form-label">Type Travel</label>
                                        <input type="text" name="type" value="{{ $item->type }}"
                                            class="form-control" id="inputProductTitle" placeholder="Enter Holidays...">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" value="{{ $item->price }}" name="price"
                                            class="form-control" id="inputProductTitle"
                                            placeholder="Enter departure_date">
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
            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    about: {
                        required: true,
                    },
                    featured_event: {
                        required: true,
                    },
                    language: {
                        required: true,
                    },
                    foods: {
                        required: true,
                    },
                    duration: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: 'Please Enter Product Name',
                    },
                    location: {
                        required: 'Please Enter Short Description',
                    },
                    about: {
                        required: 'Please Select Product Thambnail Image',
                    },
                    featured_event: {
                        required: 'Please Select Product Multi Image',
                    },
                    language: {
                        required: 'Please Enter Selling Price',
                    },
                    foods: {
                        required: 'Please Enter Product Code',
                    },
                    duration: {
                        required: 'Please Enter Product Quantity',
                    },
                    type: {
                        required: 'Please Enter Product Quantity',
                    },
                    price: {
                        required: 'Please Enter Product Quantity',
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
@endsection
