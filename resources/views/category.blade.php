@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning">{{ __('Master Category') }}</div>

                    <div class="card-body">
                        @if (session('delete'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('delete') }}
                            </div>
                        @endif

                        <table class="table table-responsive table-striped">
                            <thead>
                                <td>#</td>
                                <td>Name</td>
                                <td>Action</td>
                            </thead>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('category.hapus', $category->id) }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="d-flex">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
                <a href="{{ route('item.index')}}" class="btn btn-sm btn-warning" style="margin-top: 20px">Items</a>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning">Add Category</div>

                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-info" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Nama Kategori"><br>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn  btn btn-sm btn-primary">Save</button>
                                <button type="reset" class="btn  btn btn-sm btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
