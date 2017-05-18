<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $action = $data['action'];
    $post_id = $data['post_id'];
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    // update like - unlike
    $updateQuery = "";
    if ($action == "like") {
        $updateQuery = "UPDATE post SET num_like = num_like + 1 WHERE post_id = '$post_id'";
    } else {
        $updateQuery = "UPDATE post SET num_like = num_like - 1 WHERE post_id = '$post_id'";
    }
    $db_connection->query($updateQuery);
    $db_connection->close();
}