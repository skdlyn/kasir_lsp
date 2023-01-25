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
                            <tr>
                                <td>1</td>
                                <td>10-01-23</td>
                                <td>150.000</td>
                                <td>200.000</td>
                                <td>Raflay</td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-warning">Details</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
