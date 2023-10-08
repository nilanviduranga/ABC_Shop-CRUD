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
                    <h4 class="form-label">Add New Product (Admin_Dashboard)</h4>
                </div>
            </div>
        </div>

        <div class="col-lg-8 offset-2 mt-5">
            <form action="{{ route('UpdateProduct') }}" method="post" enctype="multipart/form">
                @csrf
                <div class="row">
                    <div class="col-10 offset-1">

                        <input class="form-control form-control-lg " type="text" name="id"
                            value="{{ $tasks->id }}" hidden>

                        <label for="ProductName" class="form-label">Product Name</label>
                        <input class="form-control form-control-lg " type="text" name="name" placeholder=""
                            aria-label=".form-control-lg example" value="{{ $tasks->name }}"><br>

                        <label for="ProductPrice" class="form-label">Product Price</label>
                        <input class="form-control form-control-lg " type="number" name="price" min="0"
                            step="0.01" placeholder="" aria-label=".form-control-lg example"
                            value="{{ $tasks->price }}"><br>

                        <label for="ProductCategory" class="form-label">Product Category</label>
                        <select class="form-select" name="category_id" aria-label="Disabled select example">
                            @foreach ($categories as $key => $cat)
                                @if ($cat->id == $tasks->category_id)
                                    <option selected value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @else
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endif
                            @endforeach

                        </select><br>

                        <label for="ProductDescription" class="form-label">Product Description</label>
                        <textarea class="form-control form-control-lg " name="description" placeholder="" aria-label=".form-control-lg example"> {{ $tasks->description }} </textarea><br>

                        <button type="submit" class="btn btn-success btn-lg">Add Product</button>
                        <a href="{{ route('adminDashboard') }}" type="button" class="btn btn-danger btn-lg">-- Skip --</a>
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
