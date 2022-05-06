@extends('layouts.main')

@section('content')
<body>
<br>

<div class="container">

    <div class="col-12 row">

    <div class="col-md-4"></div>


    <div class="col-md-4">
            <form action="/freeissuesAdd" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Free Issue Lable</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="free_issue_lable" placeholder="Enter Free Issue Lable" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Type</label>
                <select class="form-control" id="exampleFormControlSelect1" name="type">
                <option value="Flat">Flat</option>
                <option value="Multiple">Multiple</option>
                </select> 
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Purchase Product</label>
                <select class="form-control product" id="exampleFormControlSelect1" name="product_ID">
                <option>Select Product</option>
                @foreach($product as $list)
                <option value="{{$list->id}}">{{$list->product_name}}</option>
                @endforeach
                </select> 
            </div>

            <div class="form-group productName">
                
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Purchase Qty</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="purchase_qty" placeholder="Enter purchase qty" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Free Qty</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="free_qty" placeholder="Enter free qty" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Lower Limit</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lower_limit" placeholder="Enter lower limit" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Upeer Limit</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="upeer_limit" placeholder="Enter upeer limit" required>
            </div>

            
            
            <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <br><br>
    </div>


    <div class="col-md-4"></div>
            
    </div>
</div>
@endsection


@section('scripts')
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

       
    
       op+='<label for="exampleInputEmail1">Free Product</label>';
					for(var i=0;i<data.length;i++){
					op+='<input type="text" value="'+data[i].product_name+'" class="form-control" disabled>';
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
@endsection
