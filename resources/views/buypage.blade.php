@extends('layouts.app')

@section('content')
@if(!empty($requests))

<?php $k = 1; ?>
@foreach($requests as $req)

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Prix</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$k}}</th>
      <td>{{$req->name}}</td>
      <td>{{$req->prix}}</td>
      <td>{{$req->status}}</td>
    </tr>
   
  </tbody>
</table>

<?php $k++ ?>
@endforeach
@endif

@endsection