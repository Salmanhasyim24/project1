@extends('frontend.dashboard')

@section('title')
    Detail Travel
@endsection
@section('content')
    <!-- main -->
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 ps-lg-0">
                        <div class="card card-details">
                            <h1>{{ $item->title }}</h1>
                            <p>
                                {{ $item->location }}
                            </p>
                            @if ($item->MultiImgs->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img class="xzoom" id="xzoom-default"
                                            src="{{ asset('storage/' . $item->MultiImgs->first()->image) }}"
                                            xoriginal="{{ asset('storage/' . $item->MultiImgs->first()->image) }}" />
                                        <div class="xzoom-thumbs">
                                            @foreach ($item->MultiImgs as $gallery)
                                                <a href="{{ asset('storage/' . $gallery->image) }}"><img
                                                        class="xzoom-gallery" width="128"
                                                        src="{{ asset('storage/' . $gallery->image) }}"
                                                        xpreview="{{ asset('storage/' . $gallery->image) }}" /></a>
                                            @endforeach
                                        </div>
                                    </div>
                            @endif
                            <h2>Tentang Wisata</h2>
                            <p>
                                {!! $item->about !!}
                            </p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <img src="{{ url('frontend/image/ic_event.png') }}" alt=""
                                        class="features-image" />
                                    <div class="description">
                                        <h3>Featured Events</h3>
                                        <p>{{ $item->featured_event }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-end">
                                    <img src="{{ url('frontend/image/ic_language.png') }}" alt=""
                                        class="features-image" />
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{ $item->language }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-end">
                                    <img src="{{ url('frontend/image/ic_foods.png') }}" alt=""
                                        class="features-image" />
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>{{ $item->foods }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <div class="members my-3">
                            <img src="{{ asset('frontend/image/members.png') }}" alt="" class="w-75" />
                        </div>
                        <hr />
                        <h2>Trip Informations</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Date of Departure</th>
                                <td width="50%" class="text-right">
                                    {{ \Carbon\Carbon::create($item->date_of_defarture)->format('F n, Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-right">
                                    {{ $item->duration }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Type</th>
                                <td width="50%" class="text-right">
                                    {{ $item->type }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">
                                    {{ $item->price }},00 / person
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        @auth
                            <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                    Join Now
                                </button>
                            </form>
                        @endauth
                        @guest
                            <a href="{{ route('register') }}" class="btn btn-block btn-join-now mt-3 py-2">Login or Register To
                                Join</a>
                        @endguest
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ asset('frontend/libraries/xzoom/xzoom.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ asset('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".xzoom, .xzoom-gallery").xzoom({
                zoomwidth: 120,
                title: false,
                tint: '#679',
                pageXOffset: 10
            });
        });
    </script>
@endpush
