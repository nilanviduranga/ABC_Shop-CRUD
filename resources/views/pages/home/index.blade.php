@extends('layouts.login')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @elseif (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <section class="">
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight">
                            ABC Shope <br />
                            <span class="text-primary">Login Friest</span>
                        </h1>

                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <form action="{{ route('checkUser') }}" method="post" enctype="multipart/form">
                                    @csrf <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="user_name" />
                                        <label class="form-label" for="form3Example3">User Name</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="form-control" />
                                        <label class="form-label" for="form3Example4">Password</label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4 me-4">
                                        Login
                                    </button>
                                    <a href="{{ route('register') }}"
                                        class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Register</a>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
@endsection

@push('css')
    <style>
    </style>
@endpush
