<?php
require_once 'connectMySQL.php';
require_once 'functions.php';

$action = array();
$action['result'] = null;
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //receive data
    $username = clear_spaces($_POST['username']);
    $email = clear_spaces($_POST['email']);
    $password = clear_spaces($_POST['password']);
    $passwordConfirm = clear_spaces($_POST['password_confirm']);

    //check validity
    if (validUsername($username) && validPassword($password,$passwordConfirm) && validEmail($email)) {
        if ($action['result'] != 'error') {
            //valid format - connect database
            $database = new MySQLDatabase();
            $db_connection = $database->connect();

            //insert data
            $insertQuery = "INSERT INTO user(username, password, email ) VALUES (? , ?, ?)";
            $insert = $db_connection->prepare($insertQuery);
            if ($insert) {
                $insert->bind_param('sss', $username, password_hash($password, PASSWORD_DEFAULT), $email);
                if ($insert->execute()) {
                    //get the new user id
                    $user_id = $insert->insert_id;
                    //create a random key
                    $key = $username . $email . date('mY');
                    $key = md5($key);
                    //add confirm row
                    $confirm = $db_connection->query("INSERT INTO confirm(user_id, key_confirm, email) VALUES ('$user_id' , '$key', '$email')");
                    if ($confirm) {
                        //put info into an array to send to the function
                        $info = array(
                            'username' => $username,
                            'email' => $email,
                            'key' => $key);
                        //send the email
                        if (send_email_swift($info)) {
                            //email sent
                            $action['result'] = 'success';
                            $message = 'Thanks for signing up. Please check your email for confirmation!';
                        } else {
                            $action['result'] = 'error';
                            $message = 'Could not send confirm email';
                        }
                    } else {
                        $action['result'] = 'error';
                        $message = 'Confirm row was not added to the database. Reason: ' . $db_connection->error;
                    }
                } else {
                    $action['result'] = 'error';
                    if ($insert->error == "Duplicate entry '" . $username . "' for key 'username_index'") {
                        $message = "This username has been used. Please choose another one!";
                    } else {
                        $message = "This email has been used. Please choose another one!";
                    }
                }
            }
            $database->disconnect();
        }
    }


//return result
    $action['message'] = $message;
    echo json_encode($action);
}


function validUsername($username)
{
    global $action;
    global $message;
    $result = True;
    if ($username == '') {
        $action['result'] = 'error';
        $message = 'Username is required';
        $result = False;
    } else {
        if (strlen($username) < 5) {
            $action['result'] = 'error';
            $message = "Your username must be equal or longer than 5 chars!";
            $result = False;
        }
        // for english chars + numbers only
        // valid username, alphanumeric & longer than or equals 5 chars
        else if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
            $action['result'] = 'error';
            $message = 'Invalid username';
            $result = False;
        }
    }
    return $result;
}

function validPassword($password, $passwordConfirm)
{
    global $action;
    global $message;
    $result = True;
    if ($password == '') {
        $action['result'] = 'error';
        $message = 'Password is required';
        $result = False;
    } else if ($passwordConfirm == '') {
        $action['result'] = 'error';
        $message = 'Confirm your password';
        $result = False;
    } else if ($password != $passwordConfirm) {
        $action['result'] = 'error';
        $message = 'Passwords should be the same';
        $result = False;
    } else {
        if (strlen($password) < 8) {
            $action['result'] = 'error';
            $message = "Your password must be equal or longer than 8 chars!";
            $result = False;
        } else if (!preg_match("#[0-9]+#", $password)) {
            $action['result'] = 'error';
            $message = "Your password must include at least one number!";
            $result = False;
        } else if (!preg_match("#[a-zA-Z]+#", $password)) {
            $action['result'] = 'error';
            $message = "Your password must include at least one letter!";
            $result = False;
        }
    }
    return $result;
}

function validEmail($email)
{
    global $action;
    global $message;
    $result = True;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $action['result'] = 'error';
        $message = "Invalid email format";
        $result = False;
    }
    return $result;
}

?>
