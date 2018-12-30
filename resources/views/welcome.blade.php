@extends('layouts.app')

@section('content')
<div id="app">
<navbarc></navbarc>
        <main class="py-4">
@if(!empty($data))


@endif



<!-- <checkout></checkout> -->
  <slide></slide>
  <br>
  <hr>

  <produit-c datasite="{{json_encode($data)}}" ></produit-c>
 
  <footer-c></footer-c>







</main>
</div>



@endsection