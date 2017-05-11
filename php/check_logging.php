<?php
include_once 'php/functions.php';
$logged = check_logged();
if ($logged){
    include_once 'php/menu_logged.php';
}
else{
    include_once 'php/menu_unlogged.php';
}
?>