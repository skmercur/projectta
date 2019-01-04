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

  <produitc datasite="{{json_encode($data)}}" ></produitc>
 
  <footerc></footerc>







</main>
</div>



@endsection