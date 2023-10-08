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
                    <h4 class="form-label">Menage Categories (Admin_Dashboard)</h4>
                </div>
            </div>
        </div>

        <div class="col-lg-8 offset-2 mt-5">
            <form action="{{ route('storeCategory') }}" method="post" enctype="multipart/form"> {{--  --}}
                @csrf
                <div class="row">
                    <div class="col-8">
                        <input class="form-control form-control-lg " type="text" name="name"
                            placeholder="New Category Name" aria-label=".form-control-lg example">
                    </div>
                    <div class="col-4">
                        <button type="submit " class="btn btn-success btn-lg">Add Category</button>
                    </div>
                </div>
            </form>
        </div>




        <div class="col-lg-10 offset-1 mt-5">
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $task->name }}</td>

                                <td>
                                    <a href="{{ route('deleteCategory', $task->id) }}" class="btn btn-danger"> Del </a>
                                    <a href="{{ route('categoryUpdateView', $task->id) }}" class="btn btn-warning"> Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>




    </div>
@endsection

@push('css')
    <style>
    </style>
@endpush
