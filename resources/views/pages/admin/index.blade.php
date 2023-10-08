@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div>



        <div class="row mt-4 border-bottom  col-8 offset-2 mb-4">
            <div class="col-6">
                <div class="d-flex justify-content-center">
                    <h4 class="form-label">Product Menage (Admin_Dashboard)</h4>
                </div>
            </div>
            <div class="col-6 align-self-center">
                <div class="row">
                    <a href="{{ route('categoryView') }}" class="btn btn-warning col-5 me-1">Menage Product Categories </a>
                    <a href="{{ route('addProduct') }}" class="btn btn-success col-5 me-1">Add New Product </a>
                </div>
            </div>
        </div>





        <div class="d-flex justify-content-center row mt-2">
            <div class="col-md-10">


                @foreach ($tasks as $key => $task)
                    <div class="row p-2 bg-white border rounded mb-2">


                        <div class="col-md-3 mt-1">
                            <div class="d-flex flex-row">
                                <div class="col-6">
                                    <h5>{{ $task->name }}</h5>
                                </div>

                            </div>
                            <div class="d-flex flex-row">
                                <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                            </div>
                            <p class="text-justify  text-break para mb-0">Rs.{{ number_format($task->price, 2) }} </p>
                            <p class="text-justify  text-break para mb-0">Category:
                                @foreach ($categories as $key => $cat)
                                    @if ($cat->id == $task->category_id)
                                        {{ $cat->name }}
                                    @endif
                                @endforeach
                            </p>

                        </div>

                        <div class="col-md-5 mt-1">
                            <p class="text-justify  text-break para mb-0">Description:</p>
                            <p class="text-justify  text-break para mb-0">{{ $task->description }}</p>


                        </div>

                        <div class="align-items-center align-content-center col-md-2 border-start mt-1">
                            <div class="d-flex flex-column mt-4">

                                <a href="{{ route('productUpdateView', $task->id) }}"
                                    class="btn btn-warning btn-sm mt-2">Edit</a>
                                <a href="{{ route('deleteProduct', $task->id) }}"
                                    class="btn btn-warning btn-sm mt-2">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>









    </div>
@endsection

@push('css')
    <style>
    </style>
@endpush
