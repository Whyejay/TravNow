<?php
include('connectMySQL.php');
if ($_POST['password'] == $_POST['password_repeat']) {
    $username      = $_POST['name'];
    $user_password = $_POST['password'];
    $db            = new MySQLDatabase();
    $user          = 'root';
    $password      = 'KhoaUQ95';
    $database      = 'database_infs3202';
    $connection    = $db->connect($user, $password, $database);
    $select        = $connection->prepare("SELECT * FROM user WHERE user_name = ?");
    if ($select) {
        $select->bind_param('s', $username);
        $select->execute();
        $result = $select->get_result();
        if ($result->num_rows == 0) {
            $insert = $connection->prepare("INSERT INTO user(user_name, user_password) VALUES (? , ?)");
            if ($insert) {
                $insert->bind_param('ss', $username, password_hash($user_password, PASSWORD_BCRYPT));
                $insert->execute();
                echo ('ACCOUNT CREATED');
                $insert->close();
            }
        } else {
            echo ("PLEASE CHOOSE ANOTHER USERNAME!!");
        }
        $select->close();
    }
    $db->disconnect();
} else {
    echo ('PASSWORD and REPEAT_PASSWORD must be the same!');
}
?>
