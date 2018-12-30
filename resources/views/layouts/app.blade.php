<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Taher Boutique</title>

    <!-- Scripts -->
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/html2canvas.min.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" type="image/png" href="{{asset('assets/img/taher_boutique.jpg')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if(!empty($product))
<meta property="og:title" content="{{$product->name_product}}" />
<meta property="og:url" content="https://www.taherboutique/{{$product->code}}" />
<?php $k = strpos($product->images,",");
$image = substr($product->images,0,$k);
?>
<meta property="og:image" content="https://www.taherboutique/{{$image}}" />
@else
<meta property="og:title" content ="Taher Boutique"/>
    <meta property="og:image" content ="https://www.taherboutique.com/assets/img/taher_boutique.jpg"/>
@endif
</head>
<body>
    
    
    
    
       
            @yield('content')
        </main>
        
 
</body>
</html>
