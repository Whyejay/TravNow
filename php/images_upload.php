<?php
$uploadedFiles = array();


if (!empty($_FILES)) {
    foreach ($_FILES as $file) {
        if (upload_function($file)) {
            $uploadedFiles[] = 'https://infs3202-c25wl.uqcloud.net/travnow/images_upload/' . urlencode($file['name']);
        }
    }
}

echo json_encode($uploadedFiles);

function upload_function($file)
{
    $target_dir = "../images_upload/";
    $target_file = $target_dir . basename($file['name']);
    return move_uploaded_file($file['tmp_name'], $target_file);
}

function sftp_upload($file){
    $server = 'infs3202-c25wl.zones.eait.uq.edu.au';
    $port = '22';
    $username = 's4421554';
    $passwd = 'KhoaUQ95';
    // connect
    $connection = ssh2_connect($server, $port);
    if (ssh2_auth_password($connection, $username, $passwd)) {
// initialize sftp
        $sftp = ssh2_sftp($connection);

// Upload file
        echo "Connection successful, uploading file now..."."n";
        $contents = file_get_contents($file);
        file_put_contents("ssh2.sftp://{$sftp}/{$file}", $contents);

    } else {
        echo "Unable to authenticate with server"."n";
    }
}