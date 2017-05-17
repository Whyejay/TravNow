<script src="js/facebook.js" type="text/javascript"></script>
<script type="text/javascript">
    fbLogout();
</script>
<?php
session_start();
session_unset();
session_destroy();
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', 1);
}
if(isset($_COOKIE['remember_me'])) {
    $domain = $_SERVER['HTTP_HOST'];
    setcookie('remember_me', '', 1, '/', $domain);
}
header('Location: https://infs3202-c25wl.uqcloud.net/travnow/');