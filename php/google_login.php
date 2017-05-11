<?php
require_once 'functions.php';
require_once 'gp_config.php';
if (isset($_GET['code'])) {
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    $oauth_provider = 'google';
    $oauth_id = $gpUserProfile['id'];
    $username = $gpUserProfile['given_name'] . $gpUserProfile['family_name'];
    $email = $gpUserProfile['email'];
    $picture = $gpUserProfile['picture'];

    //Check whether user data already exists in database
    $user_exist = get_user_by_provider_and_id($oauth_provider, $oauth_id);

    //Update user data if already exists
    if ($user_exist) {
        update_user_info($username, $email, $picture, $oauth_provider, $oauth_id);
    }

    // Insert new  user data if not already exists
    if (!$user_exist) {
        create_new_user($username, $email, $picture, $oauth_provider, $oauth_id);
    }

    // Session
    session_start();
    $_SESSION['username'] = $username;
    header('Location: ../html/pause.html');
}