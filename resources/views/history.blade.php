@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning">{{ __('History Transaction') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-responsive table-striped">
                            <thead>
                                <td>#</td>
                                <td>Date</td>
                                <td>Total Transaction</td>
                                <td>Pay Total </td>
                                <td>Served By</td>
                                <td>Action</td>
                            </thead>
                            @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at}}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->pay_total }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <a href="{{ route('transaction.show', $item->id) }}" type="submit" class="btn btn-sm btn-warning">Details</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </table>
                    </div>
                </div>
            </div>
        @endsection
