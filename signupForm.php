<?php
require_once 'php/check_logging.php';
$action = $_REQUEST['action'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
            integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/animate-custom.css"/>

    <title>Travel Now</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
          var action = "<?php echo $action ?>";
            if (action == 'signup'){
              window.location.href = "#toregister";
            }
            else{
              window.location.href = "#tologin";
            }
            // Sign up
            $('#signup_form').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        var result = response.result;
                        var message = response.message;
                        if (result == 'success') {
                            // go to login page with the below message
                            alert(message);
                        }
                        else {
                            // show error messages
                            alert(message);
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });

            // Login
            $('#login_form_another').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        var result = response.result;
                        var message = response.message;
                        if (result == 'success') {
                            // go to login page with the below message
                            window.location.replace("pause.html");
                            return false;
                        }
                        else {
                            // show error messages
                            alert(message);
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
        });
    </script>
</head>
<body>
<div id="hero-banner" class="jumbotron container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <a href="index.php"><img class="logo" height="100" width="100" src="img/logo.png"/></a>
        </div>
        <div class="col-sm-9">
            <h1 class="display-3">Travel Now</h1>
            <p class="lead">Join us and share your wonderful experiences !</p>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-5">
            <p>
                Start your journey here !
            </p>
            <div id="output"></div>
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form id="login_form_another" autocomplete="on" method="post" action="php/login.php">
                        <h1>Log in</h1>
                        <p>
                            <label for="username" class="uname" data-icon="u"> Your Email or Username </label>
                            <input id="username" name="username" required="required" type="text"
                                   placeholder="Email or Username"/>
                        </p>
                        <p>
                            <label for="password" class="youpasswd" data-icon="p"> Your Password </label>
                            <input id="password" name="password" required="required" type="password"
                                   placeholder="Password"/>
                        </p>
                        <p class="keeplogin">
                            <input type="checkbox" name="remember_me" id="loginkeeping" value="loginkeeping"/>
                            <label for="loginkeeping">Remember Me</label>
                        </p>
                        <p class="login button">
                            <input type="submit" value="Login"/>
                        </p>
                        <p class="change_link">
                            Not a member yet ?
                            <a href="#toregister" class="to_register">Join us</a>
                        </p>
                    </form>
                </div>

                <div id="register" class="animate form">
                    <form id="signup_form" autocomplete="on" method="post" action="php/signup.php">
                        <h1> Sign up </h1>
                        <p>
                            <label for="usernamesignup" class="uname" data-icon="u">Username</label>
                            <input id="usernamesignup" name="username" required="required" type="text"
                                   placeholder="Username"/>
                        </p>
                        <p>
                            <label for="emailsignup" class="youmail" data-icon="e"> Email</label>
                            <input id="emailsignup" name="email" required="required" type="email"
                                   placeholder="Email"/>
                        </p>
                        <p>
                            <label for="passwordsignup" class="youpasswd" data-icon="p">Password </label>
                            <input id="passwordsignup" name="password" required="required" type="password"
                                   placeholder="Password"/>
                        </p>
                        <p>
                            <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Confirm
                                Password </label>
                            <input id="passwordsignup_confirm" name="password_confirm" required="required"
                                   type="password" placeholder="Confirm Password"/>
                        </p>
                        <p class="signin button">
                            <input type="submit" value="Sign up"/>
                        </p>
                        <p class="change_link">
                            Already a member ?
                            <a href="#tologin" class="to_register"> Go and log in </a>
                        </p>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>


</body>
</html>
