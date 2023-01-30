@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('item.index')}}" class="btn btn-sm btn-warning" style="margin-bottom: 20px">Home</a>
                <div class="card">
                    <div class="card-header bg-warning">{{ __('Detail Transaction') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <table class="table">
                            <tr>
                                <td class="col-md-2">Date : {{ $transaction->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-2">Served By : {{ $transaction->user->name }}</td>
                            </tr>
                        </table>

                        <table class="table table-responsive table-striped">
                            <thead>
                                <td>#</td>
                                <td>Item Name</td>
                                <td>Qty</td>
                                <td>Price</td>
                                <td>Subtotal</td>
                            </thead>
                            @foreach ($transaction->detail as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->item->price}}</td>
                                <td>{{ $item->item->price * $item->qty }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-end" colspan="4">Grand Total</td>
                                <td>{{ $transaction->total }}</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="4">Pay Total</td>
                                <td>{{ $transaction->pay_total}}</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="4">Change</td>
                                <td>{{ $transaction->pay_total - $transaction->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
