<?php
require_once 'functions.php';
const EMPTY_TITLE = 0;
const EMPTY_CONTENT = 1;
const GOOD_POST = 2;
$action = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $user_id = $data['user_id'];
    $username = $data['username'];
    $title = $data['title'];
    $content = $data['content'];
    $check = check_field($title, $content);
    if ($check == EMPTY_TITLE) {
        $action['result'] = 'error';
        $action['message'] = 'Give your post a title!';
    } else if ($check == EMPTY_CONTENT) {
        $action['result'] = 'error';
        $action['message'] = 'Give your post a content!';
    } else if ($check == GOOD_POST) {
        $post_id = create_new_post($user_id, $username, $title, $content);
        $action['result'] = 'success';
        $action['message'] = 'Created a new post successfully!';
        $action['id'] = $post_id;
    }

    // Return result
    echo json_encode($action);
}

function check_field($title, $content)
{
    $result = GOOD_POST;
    if (clear_spaces($title) == '') {
        $result = EMPTY_TITLE;
    }
    if (clear_spaces($content) == '') {
        $result = EMPTY_CONTENT;
    }
    return $result;

}

