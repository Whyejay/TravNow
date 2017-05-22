<?php
include_once 'functions.php';
$logged = check_logged();
if ($logged){
    include_once 'menu_logged.php';
}
else{
    include_once 'menu_unlogged.php';
}
?>