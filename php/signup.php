<?php
include('connectMySQL.php');
if ($_REQUEST['password'] == $_REQUEST['password_repeat']){
    $username = $_REQUEST['name'];
    $user_password = $_REQUEST['password'];
    $db = new MySQLDatabase();
    $user = 'root';
    $password = 'KhoaUQ95';
    $database = 'database_infs3202';
    $connection = $db->connect($user, $password, $database);
    $queryCheck = "SELECT * FROM `user` WHERE `user_name` = '" . $username . "'";
    $resultCheck = $connection->query($queryCheck);
    if ($resultCheck != FALSE){
        if($resultCheck->num_rows == 0){
            $queryInsert = "INSERT INTO user(user_name, user_password) VALUES 
                    ('" . $username . "', '" . password_hash($user_password, PASSWORD_BCRYPT) . "')";
            $resultInsert = $connection->query($queryInsert);
            if ($resultInsert == FALSE){
                die($connection->error);
            }
        }
        else{
            echo("PLEASE CHOOSE ANOTHER USERNAME!!");
        }
    }
    else{
        die($connection->error);
    }
    $db->disconnect();
}
else{
    echo('PASSWORD and REPEAT_PASSWORD must be the same!');
}
?>
