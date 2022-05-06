@extends('layouts.main')

@section('content')
<body>
<br>
<div class="container">
<div class="col-12 row">

<div class="col-1"></div>
        <div class="col-10">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">free_issue_lable</th>
      <th scope="col">type</th>
      <th scope="col">product_name</th>
      <th scope="col">purchase_qty</th>
      <th scope="col">free_qty</th>
      <th scope="col">lower_limit</th>
      <th scope="col">upeer_limit</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($freeissues as $list)
    <tr>
      <th scope="row">{{$list->id}}</th>
      <td>{{$list->free_issue_lable}}</td>
      <td>{{$list->type}}</td>
      <td>{{$list->product_name}}</td>
      <td>{{$list->purchase_qty}}</td>
      <td>{{$list->free_qty}}</td>
      <td>{{$list->lower_limit}}</td>
      <td>{{$list->upeer_limit}}</td>
      <td><a href="/freeissuesEdit/{{$list->id}}"><i class="icon-pencil5"></i> Edit</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

        </div>
<div class="col-1"></div>

</div>

</div>
@endsection