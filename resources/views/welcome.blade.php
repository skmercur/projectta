@extends('layouts.app')

@section('content')

<div id="app">
  <slide></slide>
  <br>
  <hr>
  <produit-c></produit-c>

</div>







<img id="profileImage"/>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2020996934662748',
      xfbml      : true,
      version    : 'v3.2'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   function statusChangeCallback(response) {
       if(response.status === 'connected'){
           console.log(response);
           testAPI();
       }else{
            console.log(response);
       }
   }
   function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log(response.id);
    
        var im = document.getElementById("profileImage").setAttribute("src", "http://graph.facebook.com/" + response.id.toString() + "/picture?type=normal")
    });
  }
 
</script>
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
@endsection