@extends('layouts.main')

@section('content')
<body>
<br>
<div class="container">
<div class="col-12 row">

<div class="col-2"></div>
        <div class="col-8">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">customer_name</th>
      <th scope="col">customer_code</th>
      <th scope="col">customer_address</th>
      <th scope="col">customer_contact</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($customer as $list)
    <tr>
      <th scope="row">{{$list->id}}</th>
      <td>{{$list->customer_name}}</td>
      <td>{{$list->customer_code}}</td>
      <td>{{$list->customer_address}}</td>
      <td>{{$list->customer_contact}}</td>
      <td><a href="/customerEdit/{{$list->id}}"><i class="icon-pencil5"></i> Edit</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

        </div>
<div class="col-2"></div>

</div>

</div>
@endsection