window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
        appId      : '253571025046701', // FB App ID
        cookie     : true,  // enable cookies to allow the server to access the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.8' // use graph api version 2.8
    });


};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    // // Check whether the user already logged in
    // FB.getLoginStatus(function(response) {
    //     if (response.status === 'connected') {
    //         //display user data
    //         getFbUserData();
    //     }
    // });
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and save the user profile data
            getFbUserData();
        } else {
            // document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email,public_profile'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,picture'},
        function (response) {
            saveUserData(response);
        });
}

// Save user data to the database
function saveUserData(userData){
    $.post('php/facebook_login.php', {userData: JSON.stringify(userData)}, function(){
        window.location = "https://infs3202-c25wl.uqcloud.net/travnow/html/pause.html" ;
        return false; });
}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        window.location = "https://infs3202-c25wl.uqcloud.net/travnow/";
    });
}
