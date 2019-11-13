function checkLoginState() {               // Called when a person is finished with the Login Button.
  FB.getLoginStatus(function(response) {   // See the onlogin handler                  // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      window.location = "home.php";
    } else {                                 // Not logged into your webpage or we are unable to tell.
      console.log('Não está logado!')
    }
  });
}

window.fbAsyncInit = function() {
  FB.init({
    appId      : '637910133282454',
    cookie     : true,
    xfbml      : true,
    version    : 'v4.0'
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

