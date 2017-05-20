<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $data = json_decode(file_get_contents("php://input"), true);
    $action = $data['action'];
    $post_id = $data['post_id'];
    $user_id = $_SESSION['id'];
    require_once 'connectMySQL.php';
    $database = new MySQLDatabase();
    $db_connection = $database->connect();

    // update like - unlike
    $updateQuery = "";
    $modifyQuery = "";
    if ($action == "like") {
        $updateQuery = "UPDATE post SET num_like = num_like + 1 WHERE post_id = '$post_id'";
        $modifyQuery = "INSERT INTO like_info(user_id,post_id) VALUES ('$user_id','$post_id')";
    } else {
        $updateQuery = "UPDATE post SET num_like = num_like - 1 WHERE post_id = '$post_id'";
        $modifyQuery = "DELETE FROM like_info WHERE user_id = '$user_id' AND post_id = '$post_id'";
    }
    $db_connection->query($updateQuery);
    $db_connection->query($modifyQuery);
    $db_connection->close();
}