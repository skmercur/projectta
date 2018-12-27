@extends('layouts.app')

@section('content')
@if(!empty($items))
@foreach($items as $item)

{{$item->code_product}}
@endforeach

@endif
@endsection