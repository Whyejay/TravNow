<?php
require_once 'functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $data = json_decode(file_get_contents("php://input"),true);
    $user_id = $data['user_id'];
    $username = $data['username'];
    $title = $data['title'];
    $content = $data['content'];
    create_new_post($id, $username, $title, $content);
}




//if (isset($_POST['username']) && isset($_POST['title']) && isset($_POST['content'])) {
//    $username = $_POST['username'];
//    $title = $_POST['title'];
//    $content = $_POST['content'];
//    create_new_post($username, $title, $content);
//}