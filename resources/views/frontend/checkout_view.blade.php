@extends('frontend.checkout')
@section('title', 'Checkout Page')

@section('content')
    <!-- main -->
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Details
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 ps-lg-0">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h1>Who is Going?</h1>
                            <p>
                                Trip to {{ $item->travel->title }}, {{ $item->travel->location }}
                            </p>
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">Picures</td>
                                            <td scope="col">Name</td>
                                            <td scope="col">Nationality</td>
                                            <td scope="col">VISA</td>
                                            <td scope="col">Passport</td>
                                            <td scope="col"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td><img src="https://ui-avatars.com/api/?name={{ $detail->username }}"
                                                        height="60" class="rounded-circle">
                                                </td>
                                                <td class="align-middle">
                                                    {{ $detail->username }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $detail->nationality }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ \Carbon\Carbon::createFromDate($detail->passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail->id) }}">
                                                        <img src="frontend/image/ic_remove.png" alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text center">
                                                    No Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form class="form-inline" method="post" action="{{ route('checkout-create', $item->id) }}">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-auto">
                                            <label for="username" class="visually-hidden">Name</label>
                                            <input type="text" name="username" class="form-control" id="username"
                                                placeholder="username" />
                                        </div>
                                        <div class="col-auto">
                                            <label for="nationality" class="visually-hidden"></label>
                                            <input type="text" name="nationality" class="form-control mb-2 mr-sm-2"
                                                style="width: 50px;" id="nationality" placeholder="nationality" />
                                        </div>
                                        <div class="col-auto">
                                            <label for="is_visa" class="visually-hidden"></label>
                                            <select name="is_visa" id="is_visa" class="form-select mb-2 me-sm-2">
                                                <option value selected>VISA</option>
                                                <option value="1">30 DAYS</option>
                                                <option value="2">N / A</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <label for="passport" class="visually-hidden">SALL Passport</label>
                                            <div class="input-group mb-2 me-sm-2">
                                                <input type="text" name="passport" class="form-control datepicker"
                                                    id="passport" placeholder="SALL Passport" />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-add-now mb-4 px-4">
                                                Add Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    You are only able to invite member that has registered in
                                    Nomads.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Information</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->details->count() }} person</td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional Visa</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->travel->Additional_visa }},00</td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">$
                                        {{ $item->travel->price }}00 / person</td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-right">$
                                        {{ $item->transaction_total }},00</td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique)</th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue">${{ $item->transaction_total }},00</span><span
                                            class="text-orange">{{ mt_rand(0, 99) }}</span>
                                    </td>
                                </tr>
                            </table>

                            <hr />
                            <h2>Payment Instructions</h2>
                            <p class="payment-instructions">
                                Please complete your payment before to continue the wonderful
                                trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/image/ic_bank.png') }}" alt=""
                                        class="bank-image" />
                                    <div class="description">
                                        <h3>PT Salman ID</h3>
                                        <p>
                                            0895 1292 9676
                                            <br />
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item">
                                    <img src="{{ url('frontend/image/ic_bank.png') }}" alt=""
                                        class="bank-image" />
                                    <div class="description">
                                        <h3>PT Salman ID</h3>
                                        <p>
                                            0899 8501 7888
                                            <br />
                                            Bank HSBC
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{ route('checkout-success', $item->id) }}"
                                class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail', $item->travel->slug) }}" class="text-muted">Cancel
                                Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/combined/css/gijgo.min.css') }}">
@endpush
@push('addon-script')
    <script src="{{ url('frontend/libraries/combined/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap5',
                icons: {
                    rightIcon: '<img src="{{ url('frontend/image/ic_doe.png') }}" alt="" />'
                }
            });
        });
    </script>
@endpush
