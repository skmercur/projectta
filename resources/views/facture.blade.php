@extends('layouts.app')

@section('content')
<?php $items = json_decode(base64_decode(app('request')->input('items')))?>


    <div id="facture" >

    <h1>Hello !! </h1>
    @foreach($items as $item)
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">code</th>
  
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->code_product}}</td>
      <td>{{$item->code_commentaire}}</td>
    
  
    </tr>
   
  </tbody>
</table>

    @endforeach
</div>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <script>
    var pdf = new jsPDF();
    var element = document.getElementById('facture');
    var width= element.style.width;
    var height = element.style.height;
    html2canvas(element).then(canvas => {
        var image = canvas.toDataURL('image/png');
        pdf.addImage(image, 'JPEG', 15, 40, width, height);
        pdf.save('facture.pdf');
    });
     </script>
@endsection