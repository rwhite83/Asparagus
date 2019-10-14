//Load the SDK asynchronously
		window.fbAsyncInit = function() {
			FB.init({
			appId      : '382748258795563',
			xfbml      : true,
			version    : 'v3.0'
			});
			FB.AppEvents.logPageView();
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
				}
			js = d.createElement(s); 
			js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		//checking login state
		function checkLoginState(){
			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});
		}

		function statusChangeCallback(response) {
			console.log('You can check various information through response');
			console.log(response);
			if (response.status === 'connected') {
				console.log('The user logged in the Facebook and the app');
				FB.api('/me', function(response) {
					console.log('Successful login for: ' + response.name);
				});
			} else if (response.status === 'not_authorized') {
				console.log('The user not logged in the app but logged in the Facebook');
			} else {
				console.log('The user not logged in Facebook and '
				+ 'it is not possible to know the conneting status in the app ')
			}
		}