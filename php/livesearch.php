<?php
$str = "%{$_REQUEST['str']}%";
$arr = array();
// connect database
require_once 'connectMySQL.php';
$database = new MySQLDatabase();
$db_connection = $database->connect();

//process
$selectQuery = "SELECT * FROM post WHERE title LIKE ?";
$select = $db_connection->prepare($selectQuery);
$select->bind_param('s', $str);
$select->execute();
$result = $select->get_result();
while ($row = $result->fetch_assoc()){
    $arr[] = array('id' => $row['post_id'], 'title' => $row['title']);
}
$db_connection->close();
echo json_encode($arr);
?>