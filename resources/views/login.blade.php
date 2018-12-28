@extends('layouts.app')

@section('content')


<h5>Welcome</h5>


<div class="fb-login-button col align-self-center" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="true" data-auto-logout-link="false" data-use-continue-as="true" onlogin="checkLoginState()"></div>

<form method="post" name="loginform" action="/login" >
@csrf
<input type="hidden" name="fb" value="" id="fb" /> 

</form>

<div id="fb-root"></div>
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