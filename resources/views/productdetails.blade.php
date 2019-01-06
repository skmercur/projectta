@extends('layouts.app')

@section('content')
@if(!empty($product->code))

<div id="app">
    <navbarc></navbarc>
    
<productdetails product="{{json_encode($product)}}"></productdetails>
</div>
@endif
@endsection