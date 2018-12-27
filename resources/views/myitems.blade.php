@extends('layouts.app')

@section('content')
@if(!empty($items))
@foreach($items as $item)

{{$item->code_product}}
@endforeach
<script>
var doc = new jsPDF();

doc.text('Hello world!', 10, 10);
doc.save('a4.pdf');
</script>
@endif
@endsection