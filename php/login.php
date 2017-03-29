<?php
include('connectMySQL.php');
$username      = $_POST['username'];
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
        echo ('WRONG USERNAME OR PASSWORD');
    } else {
        $row                    = $result->fetch_array(MYSQLI_ASSOC);
        $hashedPasswordDatabase = $row['user_password'];
        if (password_verify($user_password, $hashedPasswordDatabase)) {
            echo ('LOGIN SUCESSFULLY');
        } else {
            echo ('WRONG USERNAME OR PASSWORD');
        }
    }
    $select->close();
}
$db->disconnect();


?>
