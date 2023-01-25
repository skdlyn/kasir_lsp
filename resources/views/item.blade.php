@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
                <div class="card-header bg-warning">{{ __('Master Items') }}</div>

                <div class="card-body">
                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{-- <button type="button" class="btn btn-sm btn-close" data-dismiss="alert" aria-label="Close"></button> --}}
                            {{ session('delete') }}
                        </div>
                    @endif

                    <table class="table table-responsive table-striped">
                        <thead>
                            <td>#</td>
                            <td>Category</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Stock</td>
                            <td>Action</td>
                        </thead>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>Rp {{ number_format($item->price) }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                <a href="{{ route('item.edit', $item->id)}}" class="btn  btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('item.hapus', $item->id)}}" class="btn  btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-warning">{{ __('Add Item') }}</div>
            <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $item)
                            <li>{{$item}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('item.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="sosmed">Please Select Category</label>
                        <select class="form-select form-control" id="category" name="category_id">
                                <option value="">SELECT CATEGORY</option>
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    <div class="group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Kategori"><br>
                    </div>
                    <div class="group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" id="price" name="price"><br>
                    </div>
                    <div class="group">
                        <label for="">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock"><br>
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
