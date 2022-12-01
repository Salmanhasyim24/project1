@extends('frontend.checkout')

@section('title', 'Checkout Success')

@section('content')
    <!-- main -->
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="{{ url('frontend/image/ic_mail.png') }}" alt="">
                <h3>yayy! Success</h3>
                <p>
                    we're sent you email for trip Instruction
                    <br />
                    please read it as well
                </p>
                <a href="{{ url('/') }}" class="btn btn-home-page mt-3
            px-5">
                    Home Page
                </a>
            </div>
        </div>
    </main>
