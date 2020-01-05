@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-8 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header" style="display: flex;justify-content: space-between;align-items:center;">
                    <div>
                        <h4>Products</h4>
                    </div>
                    @can('create po')
                        <div>
                            <a href="{{ route('createpo') }}" class="btn btn-primary btn-sm">Create P.O</a>
                        </div>
                    @endcan
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stock Available</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ number_format($product->price, 2, '.', '') }}</td>
                                            <td>@if($product->stock) {{ $product->stock->quantity }} @else -- @endif</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
