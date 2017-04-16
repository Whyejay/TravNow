<?php
include_once('connectMySQL.php');

$action = array();
$action['result'] = null;
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clear_spaces($_POST['username']);
    $password = clear_spaces($_POST['password']);
    if ($username != '' && $password != '') {

        // connect database
        $database = new MySQLDatabase();
        $db_connection = $database->connect('root', 'KhoaUQ95', 'database_infs3202');

        // process
        $selectQuery = "SELECT * FROM user WHERE username = ?";
        $select = $db_connection->prepare($selectQuery);
        $select->bind_param('s', $username);
        if ($select->execute())
            $result = $select->get_result();
        if ($result->num_rows != 0) {
            $info = $result->fetch_assoc();
            if ($info['active'] != '1') {
                $action['result'] = 'error';
                $message = "Please confirm your account!";
            } else {
                if (password_verify($password, $info['password'])) {
                    $action['result'] = 'success';
                    $message = "Login successfully";
                } else {
                    $action['result'] = 'error';
                    $message = "Please check your password!";
                }
            }
        } else {
            $action['result'] = 'error';
            $message = "Please check your username!";
        }

        $select->close();
        $db_connection->close();

        //return result
        $action['message'] = $message;
        echo json_encode($action);
    } else {

    }

}

function clear_spaces($data)
{
    return preg_replace('/\s+/', '', $data);
}


if ($_REQUEST['username'] == "infs" && $_REQUEST['password'] == "3202") {
//header(“Location: index.html”);
    echo('CORRECT');
}
//else{
////header(“Location: loginform.php”);
//}
?>
