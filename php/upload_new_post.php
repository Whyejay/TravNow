<?php
require_once 'functions.php';
if (isset($_POST['username']) && isset($_POST['title']) && isset($_POST['content'])) {
    $username = $_POST['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    create_new_post($username, $title, $content);
}