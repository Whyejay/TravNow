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
    $transport = Swift_SmtpTransport::newInstance('mailhub.eait.uq.edu.au', 25, 'tls');
    $mailer = Swift_Mailer::newInstance($transport);
    $message = Swift_Message::newInstance();
    $message->setSubject('Welcome to TravelNow');
    $message->setFrom(array('travnow@mailhub.eait.uq.edu.au' => 'TravelNow'));
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
            } else {
                $user['exist'] = False;
            }
        } else {
            $user['exist'] = False;
        }

        $db_connection->close();
    } else {
        $user['exist'] = False;
    }
    return $user;
}

function get_user_by_provider_and_id($provider_name, $provider_user_id)
{
    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    //process
    $selectQuery = "SELECT * FROM user WHERE oath_provider = '$provider_name' AND oath_id = '$provider_user_id'";
    $select = $db_connection->query($selectQuery);
    $database->disconnect();
    return $select;

}

function create_new_user($username, $email, $picture, $provider_name, $provider_id)
{
    // Generate a random password
    $password = password_hash(random_string(), PASSWORD_DEFAULT);
    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    //insert
    $insertQuery = "INSERT INTO user (username, password, email,active, picture, oath_provider, oath_id)
                    VALUES ('$username', '$password', '$email', 1, '$picture', '$provider_name', '$provider_id')  ";
    $db_connection->query($insertQuery);
    $_SESSION['id'] = $db_connection->insert_id;
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
    $user_id = $info['id'];
    $token = bin2hex(openssl_random_pseudo_bytes(16)); // random 128-bit token
    $cookie = $username . '.' . $user_id . ':' . $token;
    $mac = hash_hmac('sha256', $cookie, 'KhoaUQ95');
    $cookie .= ':' . $mac;
    $domain = $_SERVER['HTTP_HOST'];
    setcookie('remember_me', $cookie, time() + (86400 * 30), '/', $domain);
}

function confirm_cookie($cookie)
{
    list ($data, $token, $mac) = explode(':', $cookie);
    $temp = hash_hmac('sha256', $data . ':' . $token, 'KhoaUQ95');
    return $temp == $mac;
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
            if (confirm_cookie($cookie)) {
                $data = explode(':', $cookie)[0];
                $username = explode('.', $data)[0];
                $id = explode('.', $data)[1];
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
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

function create_new_post($user_id, $username, $title, $content)
{
    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    //insert
    $insertQuery = "INSERT INTO post(user_id,user_username, title, content) VALUES ('$user_id','$username', '$title', '$content')";
    $db_connection->query($insertQuery);
    $id = $db_connection->insert_id;
    $database->disconnect();
    return $id;
}

function get_post_by_id($post_id)
{
    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    //process
    $selectQuery = "SELECT * FROM post WHERE post_id = '$post_id'";
    $select = $db_connection->query($selectQuery);
    $post = $select->fetch_assoc();
    $database->disconnect();
    return $post;
}

function get_next_posts_by_id($last_id)
{
    $num_posts = 2;

    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    // process
    $selectQuery = 'SELECT * FROM post WHERE post_id > ' . '$last_id' . ' ORDER BY post_id DESC LIMIT ' . '$num_posts';
    $select = $db_connection->query($selectQuery);

}

function get_newest_post_id()
{
    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    //process
    $selectQuery = "SELECT * FROM post ORDER BY post_id DESC";
    $select = $db_connection->query($selectQuery);
    $smallest_id = $select->fetch_assoc()['post_id'];
    return $smallest_id;
}

function check_liked($user_id, $post_id){
    // connect database
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();
    //process
    $selectQuery = "SELECT * FROM like_info WHERE user_id = '$user_id' AND post_id = '$post_id'";
    $select = $db_connection->query($selectQuery);
    if ($select->num_rows == 0){
        return False;
    }
    else{
        return True;
    }
}

