<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('assets/img/taher_boutique.jpg')}}">
  <title>
    Taher Boutique|Admin
  </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

         <script>
window.Laravel = {csrfToken:'{{csrf_token()}}'}
        </script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
</head>

<body>
@if(empty(Auth::user()->name))
<script>window.location = "/admin/login";</script>

@elseif(Auth::user()->confirmed == 0)

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                   <script  type="application/javascript"> document.getElementById('logout-form').submit();</script>
@else
<div id="app">
 <admin admin="{{Auth::user()}}" srcImg="{{asset('img/up.png')}}"></admin>
 </div>
<script src="{{asset('js/app.js')}}"></script>
@endif
</body>
</html>