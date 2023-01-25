@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning">{{ __('Edit Item') }}</div>

                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $eror)
                                        <li>{{ $eror }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('item.update', $item->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="group">
                                <label for="">Item Category</label>
                                <select type="hidden" id="category" class="form-control form-select"
                                    name="category_id"><br>
                                    @foreach ($category as $i)
                                        <option value="{{ $i->id }}"
                                            @if ($i->id == $item->category->id) selected @endif>{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="group">
                                <label for="">Name</label>
                                <input type="text" value="{{ $item->name }}" class="form-control" id="name"
                                    name="name" placeholder="Nama Kategori"><br>
                            </div>
                            <div class="group">
                                <label for="">Price</label>
                                <input type="number" value="{{ $item->price }}" class="form-control" id="price"
                                    name="price"><br>
                            </div>
                            <div class="group">
                                <label for="">Stock</label>
                                <input type="number" value="{{ $item->stock }}" class="form-control" id="stock"
                                    name="stock"><br>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn  btn btn-sm btn-primary" value="Save">
                                <a href="{{ route('item.index') }}" class="btn  btn btn-sm btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
