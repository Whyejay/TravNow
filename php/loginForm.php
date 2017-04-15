<?php

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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/animate-custom.css"/>

    <title>Travel Now</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#signup_form").submit(function () {
                var data = $("#signup_form").serialize();
                $.ajax({
                    url: "signup.php",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        console.log(response);
                        alert(response);
                    },
                    error: function (jqXHR, textStatus, errorMessage) {
                        alert(errorMessage);
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
            <a href="index.html"><img class="logo" height="100" width="100" src="../img/logo.png"/></a>
        </div>
        <div class="col-sm-9">
            <h1 class="display-3">Travel Now</h1>
            <p class="lead">Join us and share your wonderful experiences !</p>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <p>
                Start your journey here !
            </p>


            <a class="hiddenanchor" id="tologin"></a>
            <a class="hiddenanchor" id="toregister"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form id=login_form" autocomplete="on">
                        <h1>Log in</h1>
                        <hr></hr>
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
                            <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping"/>
                            <label for="loginkeeping">Keep me logged in</label>
                        </p>
                        <p class="login button">
                            <input id="login button" type="submit" value="Sign In"/>
                        </p>
                        <p class="change_link">
                            Not a member yet ?
                            <a href="#toregister" class="to_register">Sign Up Here</a>
                        </p>
                    </form>
                </div>

                <div id="register" class="animate form">
                    <form id="signup_form" autocomplete="on" name="signup" enctype="multipart/form-data">
                        <h1> Sign up </h1>
                        <hr></hr>
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
                        <p class="signup button">
                            <input id="signup_button" type="submit" value="Sign up" name="submit"/>
                        </p>
                        <p class="change_link">
                            Already a member ?
                            <a href="#tologin" class="to_register">Sign in Here</a>
                        </p>
                    </form>
                </div>

            </div>
        </div>
        </section>
    </div>

</div>
</div>


</body>
</html>