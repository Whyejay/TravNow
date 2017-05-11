<?php

function format_email($info, $format)
{
    $root = $_SERVER['DOCUMENT_ROOT'];
    //grab the template content
    $template = file_get_contents($root . '/travnow/html/signup_template.' . $format);
    //replace all the tags
    $template = preg_replace('{USERNAME}', $info['username'], $template);
    $template = preg_replace('{EMAIL}', $info['email'], $template);
    $template = preg_replace('{KEY}', $info['key'], $template);
    $template = preg_replace('{SITEPATH}', 'https://infs3202-c25wl.uqcloud.net/travnow/', $template);

    //return the html of the template
    return $template;

}

function send_email_swift($info)
{
    require_once '../vendor/autoload.php';
//format each email
    $body = format_email($info, 'html');
    $body_plain_txt = format_email($info, 'txt');

//setup the mailer
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
        ->setUsername('duonganhkhoa95@gmail.com')
        ->setPassword('KhoaUQ95');
    $mailer = Swift_Mailer::newInstance($transport);
    $message = Swift_Message::newInstance();
    $message->setSubject('Welcome to TravelNow');
    $message->setFrom(array('duonganhkhoa95@gmail.com' => 'TravelNow'));
    $message->setTo(array($info['email'] => $info['username']));
    $message->setBody($body_plain_txt);
    $message->addPart($body, 'text/html');
    $result = $mailer->send($message);
    return $result;
}

function clear_spaces($data)
{
    return preg_replace('/\s+/', '', $data);
}

function get_user_by_username_and_password($username, $password)
{
    $username = clear_spaces($username);
    $password = clear_spaces($password);
    $user['exist'] = True;
    if ($username != '' && $password != '') {

        // connect database
        require_once 'connectMySQL.php';
        $database = new MySQLDatabase();
        $db_connection = $database->connect();

        // process
        $selectQuery = "SELECT * FROM user WHERE username = ?";
        $select = $db_connection->prepare($selectQuery);
        $select->bind_param('s', $username);
        if ($select->execute()) {
            $result = $select->get_result();
            if ($result->num_rows != 0) {
                $info = $result->fetch_assoc();
                if ($info['active'] != '1') {
                    $user['exist'] = False;
                } else {
                    if (password_verify($password, $info['password'])) {
                        $user['info'] = $info;
                    } else {
                        $user['exist'] = False;
                    }
                }
            }
        } else {
            $user['exist'] = False;;
        }

        $db_connection->close();
    } else {
        $user['exist'] = False;
    }
    return $user;
}

function get_user_by_provider_and_id($provider_name, $provider_user_id)
{
    $result = True;
    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    //process
    $selectQuery = "SELECT * FROM user WHERE oath_provider = '$provider_name' AND oath_id = '$provider_user_id'";
    $select = $db_connection->query($selectQuery);
    if ($select->num_rows == 0) {
        $result = False;
    }

    $select->close();
    $database->disconnect();

    return $result;

}

function create_new_user($username, $email, $picture, $provider_name, $provider_id)
{
    // Generate a random password
    $random_password = random_string();
    $password = password_hash($random_password, PASSWORD_DEFAULT);
    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    //insert
    $insertQuery = "INSERT INTO user (username, password, email,active, picture, oath_provider, oath_id)
                    VALUES ('$username', '$password', '$email', 1, '$picture', '$provider_name', '$provider_id')  ";
    $db_connection->query($insertQuery);
    $database->disconnect();
}

function update_user_info($username, $email, $picture, $provider_name, $provider_id)
{
    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    // update
    $updateQuery = "UPDATE user SET 
    username = '$username', email = '$email', picture = '$picture', 
    oath_provider = '$provider_name', oath_id = '$provider_id'";
    $db_connection->query($updateQuery);
    $database->disconnect();
}

function set_cookie($info)
{
    $username = $info['username'];
    $token = bin2hex(openssl_random_pseudo_bytes(16)); // random 128-bit token
    $cookie = $username . ':' . $token;
    $mac = hash_hmac('sha256', $cookie, 'KhoaUQ95');
    $cookie .= ':' . $mac;
    setcookie('remember_me', $cookie);
}

function confirm_cookie($cookie)
{
    list ($username, $token, $mac) = explode(':', $cookie);
    return hash_equals(hash_hmac('sha256', $username . ':' . $token, SECRET_KEY), $mac);
}

function check_logged()
{
    session_start();
    $result = False;
    if (isset($_SESSION['username'])) {
        $result = True;
    } else {
        if (isset($_COOKIE['remember_me'])) {
            $cookie = $_COOKIE['remember_me'];
            require_once 'functions.php';
            if (confirm_cookie($cookie)) {
                $username = explode(':', $cookie)[0];
                $_SESSION['username'] = $username;
                $result = True;
            }
        }
    }
    return $result;
}

function random_string()
{
    $pass = [];
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, count($alphabet) - 1);
        $pass[$i] = $alphabet[$n];
    }
    $password = implode('|', $pass);
    return $password;
}