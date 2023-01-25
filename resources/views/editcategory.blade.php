@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
        <div class="card-header bg-warning">{{ __('Category Edit') }}</div>

        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $eror)
                            <li>{{$eror}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('category.update', $name->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $name->name }}"><br>
                </div>
                <div class="form-group">
                    <button type="submit" id="simpan" name="simpan" class="btn  btn btn-sm btn-primary">Save Change</button>
                <a href="{{ route('category.index') }}"type="button" class="btn btn btn-sm btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
