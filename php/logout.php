<script src="js/facebook.js" type="text/javascript"></script>
<script type="text/javascript">
    fbLogout();
</script>
<?php
session_start();
session_unset();
session_destroy();
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600);
}
if(isset($_COOKIE['remember_me'])) {
    unset($_COOKIE['remember_me']);
    setcookie('remember_me', '', time() - 3600);
}