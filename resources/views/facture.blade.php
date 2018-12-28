@extends('layouts.app')

@section('content')
<?php $items = json_decode(base64_decode(app('request')->input('items')));

$client = app('request')->input('client');
?>


    <div id="facture" style="height:100%;width:100%" >





  

<div class="page-header">
    <h1>Facture <small>Taher Boutique.</small></h1>
</div>

<!-- Simple Invoice - START -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                
                <i class="fa fa-shopping-cart pull-left icon"></i>
                <h2>Facture de Client N {{$client}}</h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Informations de paiement</div>
                        <div class="panel-body">
                            <strong>Methode de payment:</strong> Ccp<br>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Préférences de commande</div>
                        <div class="panel-body">
                            <strong>Cadeau:</strong> Non<br>
                            <strong>Livraison Express:</strong> Oui<br>
                            <strong>Assurance:</strong> No<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 ">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Magasin Address</div>
                        <div class="panel-body">
                            <strong>12 hectares num 20"exp"</strong><br>
                            bordj bou arreridj<br>
                            34000<br>
                            <strong>Algerie</strong><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>la commande</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>#</strong></td>
                                    <td class="text-center"><strong>Produit</strong></td>
                                    <td class="text-center"><strong>Le code pour le commentaire</strong></td>
                                </tr>
                            </thead>
                            <tbody>

                             
                                @foreach($items as $item)
  @if(!empty($item->code_product))
  <?php $k = $item->prix; ?>
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td class="text-center">{{$item->code_product}}</td>
      <td class="text-center">{{$item->code_commentaire}}</td>
                                    
                                
                                </tr>
                              @endif
                              @endforeach
                               
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-right">{{$k}} DA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   
</div>

<style>

#facture{
  -ms-transform: scale(0.5,0.5); /* IE 9 */
  -webkit-transform: scale(0.5,0.5); /* Safari */
  transform: scale(0.9,0.5); 
  

   
}
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

<!-- Simple Invoice - END -->

</div>



</div>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <script>
    var pdf = new jsPDF();
    var element = document.getElementById('facture');
    var width = pdf.internal.pageSize.getWidth();
var height = pdf.internal.pageSize.getHeight();
    html2canvas(element).then(canvas => {
        var image = canvas.toDataURL('image/png');
        pdf.addImage(image, 'JPEG', 0, 0, width, height);
        pdf.save('facture.pdf');
    });
     </script>
@endsection