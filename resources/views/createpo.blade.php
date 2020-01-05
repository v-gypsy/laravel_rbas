@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-8 col-md-12 col-lg-12 col-sm-8">
            <div class="card">
                <div class="card-header">Create Purchase Order</div>

                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('purchaseorder') }}" id="poform">
                       {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-6 col-ms-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                  <label for="warehouse">Warehouse:</label>
                                  <input type="text" class="form-control" id="warehouse" placeholder="Enter warehouse name" name="warehouse">
                                </div>    
                            </div>
                            <div class="col-xs-6 col-ms-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                  <label for="batchid">Batch ID:</label>
                                  <input type="text" class="form-control" id="batchid" placeholder="Enter batchid" name="batchid">
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-ms-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                  <label for="productname">Product Name:</label>
                                  <input type="text" class="form-control" id="product" placeholder="Enter product name" name="product">
                                  <input type="hidden" id="productid" name="productid" value="">
                                </div>    
                            </div>
                            <div class="col-xs-6 col-ms-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                  <label for="quantity">Quantity:</label>
                                  <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-ms-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                  <label for="totalcost">Total Cost:</label>
                                  <input type="text" class="form-control" id="totalcost" placeholder="Enter totalcost" name="totalcost">
                                </div>    
                            </div>
                            <div class="col-xs-6 col-ms-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                  <label for="expiry">Expiry:</label>
                                  <input type="text" class="form-control" id="expiry" placeholder="Enter expiry" name="expiry">
                                </div>    
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default" id="submitbtn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
  <!-- <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script> -->
  
  <script>
    var tags = ['hello', 'hey', 'abc'];
    $(document).ready(function() {

      $('#expiry').datepicker()
      
      $('#product').autocomplete({
        source: function(request, response) {
            $.ajax({
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },      
                type: 'POST',      
                url: "{{url('autocomplete')}}",
                data: {
                        term : request.term
                 },
                dataType: "json",
                success: function(data){
                   var resp = $.map(data,function(obj){
                        return obj;
                   }); 
     
                   response(resp);
                }
            });
        },
        select: function(event, ui) {
          $('#productid').val(ui.item.product_id);                                       
          console.log(ui)
        }
      })

      $('#warehouse').autocomplete({
        source: function(request, response) {
            $.ajax({
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },      
                type: 'POST',      
                url: "{{url('autocomplete2')}}",
                data: {
                        term : request.term
                 },
                dataType: "json",
                success: function(data){
                   var resp = $.map(data,function(obj){
                        return obj;
                   }); 
     
                   response(resp);
                }
            });
        },
        select: function(event, ui) {
          console.log(ui)
        }
      })

      $('#submitbtn').click(function(e){
        e.preventDefault();
        if($('#product').val() == ""){
          alert('Please enter product.');
          return;
        }
        if($('#quantity').val() == ""){
          alert('Please enter quantity.');
          return;
        }
        if($('#totalcost').val() == ""){
          alert('Please enter price.');
          return;
        }
        $('#poform').submit();
      })
    })
  </script>
@endsection
