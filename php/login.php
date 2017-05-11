<?php
require_once 'functions.php';

$action = array();
$action['result'] = null;
$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = get_user_by_username_and_password($username, $password);

    if ($user['exist']) {

        $action['result'] = 'success';
        $message = "Login successfully";

        // session
        session_start();
        $_SESSION['username'] = $username;

        // cookies
        if (isset($_REQUEST['remember_me'])) {
            require_once 'functions.php';
            $info = $user['info'];
            set_cookie($info);
        }

    } else {
        $action['result'] = 'error';
        $message = "Please check your login details";
    }

    $action['message'] = $message;
    echo json_encode($action);

} else if (isset($_REQUEST['userData'])) {






//    // the selected provider
//    $provider_name = $_REQUEST["provider"];
//
//    try {
//        // inlcude HybridAuth library
//        // change the following paths if necessary
//        $config = '/var/www/htdocs/travnow/vendor/hybridauth/hybridauth/hybridauth/config.php';
//        require_once('../vendor/autoload.php');
//
//        // initialize Hybrid_Auth class with the config file
//        $hybridauth = new Hybrid_Auth($config);
//
//        // try to authenticate with the selected provider
//        $adapter = $hybridauth->authenticate($provider_name);
//
//        // then grab the user profile
//        $user_profile = $adapter->getUserProfile();
//
//        $user_exist = get_user_by_provider_and_id($provider_name, $user_profile->identifier);
//
//        if (!$user_exist) {
//            $insert = create_new_hybridauth_user(
//                $user_profile->displayName,
//                $user_profile->email,
//                $provider_name,
//                $user_profile->identifier
//            );
//            if ($insert) {
//                // session
//                session_start();
//                $_SESSION['username'] = $user_profile->displayName;
//                header('Location: ../html/pause.html');
//            }
//        }
//        else{
//            // session
//            session_start();
//            $_SESSION['username'] = $user_profile->displayName;
//            header('Location: ../html/pause.html');
//        }
//
//    } catch (Exception $e) {
//        switch ($e->getCode()) {
//            case 0 :
//                echo "Unspecified error.";
//                break;
//            case 1 :
//                echo "Hybridauth configuration error.";
//                break;
//            case 2 :
//                echo "Provider not properly configured.";
//                break;
//            case 3 :
//                echo "Unknown or disabled provider.";
//                break;
//            case 4 :
//                echo "Missing provider application credentials.";
//                break;
//            case 5 :
//                echo "Authentication failed The user has canceled the authentication or the provider refused the connection.";
//                break;
//            case 6 :
//                echo "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.";
//                $authProvider->logout();
//                break;
//            case 7 :
//                echo "User not connected to the provider.";
//                $authProvider->logout();
//                break;
//            case 8 :
//                echo "Provider does not support this feature.";
//                break;
//        }
//
//        echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();
//
//        echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";
//
//    }


}


?>
