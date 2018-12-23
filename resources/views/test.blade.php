<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

         <script>
window.Laravel = {csrfToken:'{{csrf_token()}}'}
        </script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
</head>

<body>
@if(empty(Auth::user()->name))
<script>window.location = "/login";</script>
@endif

@if(Auth::user()->confirmed == 0)
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                   <script  type="application/javascript"> document.getElementById('logout-form').submit();</script>
@endif
<div id="app">
 <admin admin="{{Auth::user()}}" srcImg="{{asset('img/up.png')}}"></admin>
 </div>
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>