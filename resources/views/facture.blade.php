@extends('layouts.app')

@section('content')
<?php $items = json_decode(base64_decode(app('request')->input('items')))?>


    <div id="facture" >
    <div class="container" style="margin:5vh">
    <h1>Votre facture </h1>
    <div class="table-responsive-sm" style="margin-top:5vh;">
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">le Code pour le commantaire</th>
  
    </tr>
  </thead>
  <tbody>
  @foreach($items as $item)
  @if(!empty($item->code_product))
  <?php $k = $item->prix; ?>
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->code_product}}</td>
      <td>{{$item->code_commentaire}}</td>
    
      
    </tr>
    @endif
    @endforeach

  </tbody>
  <h3 style="float:left">Avec un prix total de <b>{{$k}} DA</b></h3>
</table>

</div>

    </div>
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
        pdf.addImage(image, 'JPEG', 0, 0, width, height);
        pdf.save('facture.pdf');
    });
     </script>
@endsection