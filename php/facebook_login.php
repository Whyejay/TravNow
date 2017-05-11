<?php
require_once 'functions.php';

$userData = json_decode($_POST['userData']);
if (!empty($userData)) {

    // get data
    $oauth_provider = 'facebook';
    $oauth_id = $userData->id;
    $username = $userData->first_name . ' ' . $userData->last_name;
    $email = $userData->email;
    $picture = $userData->picture->data->url;

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
}


?>