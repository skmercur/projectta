<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Taher Boutique</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131592088-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131592088-1');
</script>

    <!-- Scripts -->
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>

    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>

    <script defer src="{{ asset('js/app.js') }}" ></script>
    <script defer src="{{ asset('js/html2canvas.min.js') }}" ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" type="image/png" href="{{asset('assets/img/taher_boutique.jpg')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link async href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" >
    <link async rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"  integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if(!empty($product))
<meta property="og:title" content="{{$product->name_product}}" />
<meta property="og:url" content="https://www.taherboutique.com/{{$product->code}}" />
<?php $k = strpos($product->images,",");
$image = substr($product->images,0,$k);
$small = strpos($image,'.');
$smallIm = substr($image,0,$small);
$image = $smallIm."_r.jpg";
$url = "https://www.taherboutique.com/".$image;
?>
<meta property="og:image" content="<?php echo $url; ?>" />
   
  <meta property="og:description" content="{{$product->summery}}" />
@else
<meta property="og:title" content ="Taher Boutique"/>
    <meta property="og:image" content ="https://www.taherboutique.com/assets/img/taher_boutique.jpg"/>
@endif
</head>
<body>
    
    <!-- Load Facebook SDK for JavaScript -->




    
    
       
            @yield('content')
        </main>
        
 
</body>
</html>
