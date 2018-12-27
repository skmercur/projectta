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
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$k}}</th>
      <td>{{$req->name}}</td>
      <td>{{$req->prix}}</td>
      <td>{{$req->status}}</td>
      <td></td>
    </tr>
   
  </tbody>
</table>

<?php $k++ ?>
@endforeach
@endif
<script>
file_changed(){
    document.forms["imageccp"].submit();
}
</script>
<form method="post" action="/buy" name="imageccp" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$client}}" />
<div class="form-group">
    <label for="exampleFormControlFile1">Ajouter la photo du recu CCP</label>
    <input type="file" name="image" class="form-control-file" onchange="file_changed(this)" id="exampleFormControlFile1">
  </div>
</form>
@endsection