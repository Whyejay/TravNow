<?php
// connect database
require_once 'connectMySQL.php';
$database = new MySQLDatabase();
$db_connection = $database->connect();

//process
$selectQuery = "SELECT * FROM post ORDER BY post_id DESC";
$select = $db_connection->query($selectQuery);
$smallest_id = $select->fetch_assoc()['post_id'];
echo $smallest_id;
?>
