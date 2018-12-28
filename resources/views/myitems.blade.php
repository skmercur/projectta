@extends('layouts.app')

@section('content')
@if(!empty($items))
<div class="container">
<div class="table-responsive-sm" style="margin-top:5vh;">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>
<?php $k = 0; ?>
@foreach($items as $item)
<?php $k = $item->prix; ?>
@if(!empty($item->code_product))
<tr>
<?php 
$status = '';
switch($item->status){
case 0:{
    $status = "le paiement n'a pas été encore confirmé";
    break;
}
case 1:{
    $status = "la paiement a été confirmé";
    break;
}
case 2:{
    $status = "la paiement a été rejeté";
    break;
}
case 3:{
    $status = "le produit a été livré";
    break;
}
}
?>

      <th scope="row">{{$item->id}}</th>
      <td>{{$item->code_product}}</td>
     
      <td>{{$status}}</td>
    </tr>
@endif
@endforeach
</tbody>
</table>
<div class="container">
<h3 style="float:right">Avec un prix total de <b>{{$k}} DA</b></h3>
<h4><a href="{{$link}}">Le recu de paiement</a></h4>
</div>

</div>
</div>
@endif
@endsection