<?php
include_once('connectMySQL.php');
include_once('functions.php');


//setup some variables
$action = array();
$action['result'] = null;

//quick/simple validation
if (empty($_GET['email']) || empty($_GET['key'])) {
    $action['result'] = 'error';
    $action['message'] = 'We are missing variables. Please double check your email.';
}

if ($action['result'] != 'error') {
    //receive data
    $email = $_GET['email'];
    $key = $_GET['key'];

    //connect database
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    //check if the key is in the database
    $check_key = $db_connection->query("SELECT * FROM confirm WHERE email = '$email' AND key_confirm = '$key' LIMIT 1");

    if ($check_key->num_rows != 0) {

        //get the confirm info
        $confirm_info = $check_key->fetch_assoc();

        //confirm the email and update the users database
        $update_users = $db_connection->query("UPDATE user SET active = 1 WHERE id = '$confirm_info[user_id]' LIMIT 1");

        //delete the confirm row
        $delete = $db_connection->query("DELETE FROM confirm WHERE id = '$confirm_info[id]' LIMIT 1");

        if ($update_users) {
            $action['result'] = 'success';
            $action['message'] = 'User has been confirmed. Thank-You!';
        } else {
            $action['result'] = 'error';
            $action['message'] = 'The user could not be updated Reason: ' . $db_connection->error;
        }
    } else {
        $action['result'] = 'error';
        $action['message'] = 'The key and email is not in our database.';
    }

}

echo json_encode($action); ?>

