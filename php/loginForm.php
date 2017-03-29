<!--
<?php
include ‘alreadyLogin.php’;
?>
-->
<html>

<head>
    <title> Login Form</title>
</head>

<body>
    <form method="POST" action="login.php">
        Login Information: <br> Username: <input type="text" name="username" size="20" class="content" /><br> Password: <input type="password" name="password" size="20" class="content" /><br>
        <input type="submit" value="Submit" name="Submit" class="content" />
        <input type="reset" value="Reset" name="Reset" class="content" />
    </form>
</body>

</html>
