@extends('layouts.main')

@section('content')
<body>
<br>

<div class="modal align-middle" id="MyModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/addProdectItem" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product</label>
                        <select class="form-control product" id="exampleFormControlSelect1" name="product_ID">
                        <option>Select Product</option>
                        @foreach($product as $list)
                        <option value="{{$list->id}}">{{$list->product_name}}</option>
                        @endforeach
                        </select> 
                    </div>

                    <div class="form-group productName">
                
                    </div>

                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="number" value="1" class="form-control quantity update-cart"  id="qty" name="qty" onchange="myFunction()"/>
                    
                    <br>

                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div> 
            <div class="modal-footer">
                
                <button class="btn btn-info" data-dismiss="modal">Close</button>
            </div>                
        </div>
    </div>
</div>

<div class="container">
<div class="col-12 row">

<div class="col-1"></div>
        <div class="col-10">

            <div class="form-group col-4">
                <label for="exampleInputEmail1">Customer</label>
                <select class="form-control product" id="exampleFormControlSelect1" name="customer_ID">
                <option>Select Customer</option>
                @foreach($customer as $list)
                <option value="{{$list->id}}">{{$list->customer_name}}</option>
                @endforeach
                </select> 
            </div>


            <div class="form-group col-4">
                <label for="exampleInputEmail1">Invoice Code</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="invoiceCode" value="<?php echo(rand(111111, 999999));?>" placeholder="Auto Generate Customer Code" disabled>
            </div>


        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="row"><button class="btn btn-success" data-toggle="modal" data-target="#MyModal">+</button></th>
      <th scope="col">#</th>
      <th scope="col">product_name</th>
      <th scope="col">Product_code</th>
      <th scope="col">product_price</th>
      <th scope="col">qty</th>
      <th scope="col">free qty</th>
      <th scope="col">total price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @php
     $total = 0;
    @endphp

    @if(session('cart'))
        @foreach(session('cart') as $id => $details)
    <tr>
      <th></th>
      <th scope="row">{{ $details['id'] }}</th>
      <td>{{$details['product_name']}}</td>
      <td>{{$details['product_code']}}</td>
      <td>{{$details['product_price']}}</td>
      <td>{{$details['quantity']}}</td>
      @if($details['type'] == "Multiple")

        @if($details['quantity'] > $details['purchase_qty'])

       

        <td>{{number_format($details['quantity'] / $details['purchase_qty']) * $details['free_qty']}}</td>

        @elseif($details['quantity'] < $details['purchase_qty'])
        <td>0</td>

        @endif

      @elseif($details['type'] == "Flat")
      
        @if($details['quantity'] > $details['purchase_qty'])

        <td>{{$details['free_qty']}}</td>

        @elseif($details['quantity'] < $details['purchase_qty'])
        <td>0</td>

        @endif
      
      

      @endif
      <td>{{ $details['product_price'] * $details['quantity'] }} <input type="hidden" name="" value="{{ $details['product_price'] * $details['quantity'] }}"  id="subtotal"></td>
      @php
        $total += $details['product_price'] * $details['quantity'];
      @endphp
      <td>
        <!-- <a href=""><i class="icon-pencil5"></i> Edit</a> -->
        <button class="btn btn-danger remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
      </td>
    </tr>
        @endforeach
    @endif
  </tbody>
  <tfoot>
       
            <td colspan="7" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total {{$total}} </strong></td>
            <td colspan="1" class="hidden-xs"></td>
        </tr>
        </tfoot>
</table>



        </div>
<div class="col-1"></div>

</div>

</div>
@endsection

@section('scripts')
<script>

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){

$(document).on('change','.product',function(){
    console.log("hmm its change");

  var product=$(this).val();
     console.log(product);

  var div=$(this).parent().parent().parent();

  var op=" ";

   $.ajax({
     type:'get',
     url:'{!!URL::to('productSelect')!!}',
     data:{'id':product},
     success:function(data){
       console.log('success');

       console.log(data);

       console.log(data.jength);

       
    
       
					for(var i=0;i<data.length;i++){
                    op+='<label for="exampleInputEmail1">Product_code</label>';
                    op+='<input type="text" value="'+data[i].Product_code+'" class="form-control" disabled>';
                    op+='<label for="exampleInputEmail1">product_price</label>';
                    op+='<input type="text" value="'+data[i].product_price+'" class="form-control" disabled>';
        }

div.find('.productName').html(" ");
div.find('.productName').append(op);



     },
     error:function(){

     }
   });
  });
});
</script>

<script>
$(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
</script>
@endsection