<?php
include_once('connectMySQL.php');
include_once('functions.php');

$message = [];
$action = array();
$action['result'] = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo count($_POST);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password_confirm'];
    checkUsername($username);
    checkPassword($password, $passwordConfirm);
    checkEmail($email);
    if ($action['result'] != 'error'){
        $database = new MySQLDatabase();
        $db_connection = $database->connect('root', 'KhoaUQ95', 'database_infs3202');
        $insertQuery = "INSERT INTO user(username, password, email ) VALUES (? , ?, ?)";
        $insert = $db_connection->prepare($insertQuery);
        if ($insert) {
            $insert->bind_param('sss', $username, password_hash($password, PASSWORD_BCRYPT), $email);
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
                    if (send_email($info)) {
                        //email sent
                        $action['result'] = 'success';
                        $message[] = 'Thanks for signing up. Please check your email for confirmation!';
                    } else {
                        $action['result'] = 'error';
                        $message[] = 'Could not send confirm email';
                    }
                } else {
                    $action['result'] = 'error';
                    $message[] = 'Confirm row was not added to the database. Reason: ' . $db_connection->error;
                }
            } else {
                $action['result'] = 'error';
                $message[] = 'User could not be added to the database. Reason: ' . $insert->error;
            }
        }
        $insert->close();
        $db_connection->close();
    }
    $action['message'] = $message;
    echo show_errors($action);
}

function checkUsername($username)
{
    global $action;
    global $message;
    $username = trim($username);
    if ($username == '') {
        $action['result'] = 'error';
        $message[] = 'Username is required';
    } else {
        if (strlen($username) < 5) {
            $action['result'] = 'error';
            $message[] = "Your username must be equal or longer than 5 chars!";
        }
        // for english chars + numbers only
        // valid username, alphanumeric & longer than or equals 5 chars
        if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
            $action['result'] = 'error';
            $message[] = 'Invalid username';
        }
    }
}

function checkPassword($password, $passwordConfirm)
{
    global $action;
    global $message;
    $password = trim($password);
    $passwordConfirm = trim($passwordConfirm);

    if ($password == '') {
        $action['result'] = 'error';
        $message[] = 'Password is required';
    } else if ($passwordConfirm == '') {
        $action['result'] = 'error';
        $message[] = 'Confirm your password';
    } else if ($password != $passwordConfirm) {
        $action['result'] = 'error';
        $message[] = 'Passwords should be the same';
    } else {
        if (strlen($password) < 8) {
            $action['result'] = 'error';
            $message[] = "Your password is too short!";
        }

        if (!preg_match("#[0-9]+#", $password)) {
            $action['result'] = 'error';
            $message[] = "Your password must include at least one number!";
        }

        if (!preg_match("#[a-zA-Z]+#", $password)) {
            $action['result'] = 'error';
            $message[] = "Your password must include at least one letter!";
        }
    }
}

function checkEmail($email)
{
    global $action;
    global $message;
    $email = trim($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $action['result'] = 'error';
        $message[] = "Invalid email format";
    }
}

?>
