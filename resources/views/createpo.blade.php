@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-sm-8">
            <div class="card">
                <div class="card-header">Create Purchase Order</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('purchaseorder') }}">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="warehousename">Warehouse Name:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="warehousenamesel">
                                    @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="productname">Product Name:</label>
                            <div class="col-sm-10">          
                                <select class="form-control" id="productnamesel">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="batchid">Batch ID:</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="batchid" placeholder="Enter batch id" name="batchid">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="quantity">Quantity:</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="price">Total Price:</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="date">Date:</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="date" placeholder="Enter batch id" name="Date">
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
