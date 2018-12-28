@extends('layouts.app')

@section('content')


<div class="text-center" style="margin-top:5vh">
<h5>Welcome</h5>
<img class="mb-4" src="https://scontent-mrs1-1.xx.fbcdn.net/v/t1.0-9/26239766_1980207352305847_259052501415261259_n.jpg?_nc_cat=106&_nc_ht=scontent-mrs1-1.xx&oh=eb2734b4548c0eb01e33520ec105930c&oe=5CD6AB33" alt="" width="100" height="100">


</form>

<div class="card text-center">
  <div class="card-header">
    Login
  </div>
  <div class="card-body">
    <h5 class="card-title">Continuer Votre Achat </h5>
    <p class="card-text">Contenuer votre achat avec click sur cette button .</p>
    <div class="fb-login-button col align-self-center" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="true" data-auto-logout-link="false" data-use-continue-as="true" onlogin="checkLoginState()"></div>

<form method="post" name="loginform" action="/login" >
@csrf
<input type="hidden" name="fb" value="" id="fb" /> 
   
  </div>
</div>




<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2&appId=2020996934662748&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function statusChangeCallback(response) {
if(response.status === 'connected'){
 console.log(response);
 document.getElementById('fb').value= response.authResponse.userID;
 document.forms["loginform"].submit();


}else{
  console.log(response);
}
}
function checkLoginState() {
FB.getLoginStatus(function(response) {
statusChangeCallback(response);
});
}

</script>

@endsection