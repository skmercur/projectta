@extends('layouts.app')

@section('content')

@if(!empty($requests))

<?php $k = 1; ?>
@foreach($requests as $req)
<div class="col align-self-center">
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
</div>


<?php $k++ ?>
@endforeach
@endif

<form method="post" action="/buy" name="imageccp" enctype="multipart/form-data">
@csrf

<input type="hidden" name="id" value="{{$client}}" />
<?php $k=""; ?>
@foreach($requests as $req)
<?php $k .= $req->code."," ?>

@endforeach

<input type="hidden" name="code" value="{{$k}}" />

<br>
<hr>
<h1>Recu CCP :</h1>
<section>

<div class="form-group">
    <label for="exampleFormControlFile1">Veuille Selectioné la photo du recu du paiement CCP</label>
    <input type="file" name="image" class="form-control-file" accept="image/*" id="exampleFormControlFile1">
    <input class="btn btn-success mt-3" value="envoyer l'image " type="submit">
  </div>
  </section>
</form>




<!-- //////////////////////////////////////////////// -->


@endsection


<style>
section {
  padding:24px;
  margin:0 auto;
  width:500px;
  
  border-left:1px solid black;
  border-right:1px solid black;
}
</style>