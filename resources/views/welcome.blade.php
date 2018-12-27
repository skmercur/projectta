@extends('layouts.app')

@section('content')

@if(!empty($data))

<!--<?php var_dump($data[0]->produit[0]->product->images) ?>-->
@endif



<!-- <checkout></checkout> -->
  <slide></slide>
  <br>
  <hr>

  <produit-c datasite="{{json_encode($data)}}" ></produit-c>
 
  <footer-c></footer-c>












@endsection