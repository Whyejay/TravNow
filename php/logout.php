<?php
session_start();
session_destroy();
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600);
}
if(isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', time() - 3600);
}