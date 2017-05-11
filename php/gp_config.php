<?php
session_start();

// Require libraries
require_once('../vendor/autoload.php');

/*
 * Configuration and setup Google API
 */
$clientId = '320095725009-d387sevn98rekm306t13f8sa0pp5qvq3.apps.googleusercontent.com';
$clientSecret = 'whJpBnwb_2ULguUmDlgM-YK-';
$redirectURL = 'https://infs3202-c25wl.uqcloud.net/travnow/';
$simple_api_key = 'AIzaSyDT5fhHJS5WJFT_lhk_WTpr0FsrgxLNkwI';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to TravNow.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);
$client->setDeveloperKey($simple_api_key);

$google_oauthV2 = new Google_Service_Oauth2($gClient);
?>