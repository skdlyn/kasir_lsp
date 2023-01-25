@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                                <td class="col-md-2">Date : 10-01-23</td>
                            </tr>
                            <tr>
                                <td class="col-md-2">Served By : Raflay</td>
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
                            <tr>
                                <td>1</td>
                                <td>Nasi Goreng</td>
                                <td>3</td>
                                <td>200.000</td>
                                <td>200.000</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="4">Grand Total</td>
                                <td>200000</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="4">Pay Total</td>
                                <td>200000</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="4">Change</td>
                                <td>0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
