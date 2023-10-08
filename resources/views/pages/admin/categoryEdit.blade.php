@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div>

        <div class="row mt-4 border-bottom  col-8 offset-2">
            <div class="col-10 offset-1">
                <div class="d-flex justify-content-center">
                    <h4 class="form-label">Update Category (Admin_Dashboard)</h4>
                </div>
            </div>
        </div>

        <div class="col-lg-8 offset-2 mt-5">
            <form action="{{ route('UpdateCategory') }}" method="post" enctype="multipart/form">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <input class="form-control form-control-lg " type="text" name="name"
                            placeholder="New Category Name" aria-label=".form-control-lg example"
                            value="{{ $tasks->name }}">
                        <input class="form-control form-control-lg " type="text" name="id"
                            value="{{ $tasks->id }}" hidden>
                    </div>
                    <div class="col-4">
                        <button type="submit " class="btn btn-warning btn-lg">Update Category Name</button>
                    </div>
                </div>
            </form>
        </div>



    </div>
@endsection

@push('css')
    <style>
    </style>
@endpush
