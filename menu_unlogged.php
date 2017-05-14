<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="js/facebook.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Normal login
            $('#login_form').on('submit', function (e) {
                e.preventDefault();
                alert($(this).serialize());
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
                            window.location.replace("./html/pause.html");
                            return false;
                        }
                        else {
                            // show error messages
                            alert(message);
                            $('#output').html(message);
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        //alert(errorThrown);
                        $('#output').html(response.message);
                    }
                });
            });

            // Facebook login
            $('#facebook_button').click(function () {
                fbLogin();
            });
        });
    </script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="./index.php"><img src="./img/logo.png" alt="Logo Picture"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="home"><a href="./index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="travel.php">Travel</a></li>
            <li><a href="activity.php">Activities</a></li>
            <li><a href="eat.php">Restaurants</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li id = "post_button"><a href="#">Create a postt</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                <ul id="login-dp" class="dropdown-menu">
                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                Login via
                                <div class="social-buttons">
                                    <a class="btn btn-fb" id="facebook_button"><i
                                                class="fa fa-facebook"></i> Facebook</a>
                                    <a href="php/google_login.php" class="btn btn-gg" id="google_button"><i
                                                class="fa fa-google"></i> Google</a>
                                </div>
                                or
                                <form id="login_form" class="form" role="form" method="post" action="./php/login.php"
                                      accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                        <label for="username" class="username" data-icon="u"> Your Email or
                                            Username </label>
                                        <input id="username" name="username" required="required" type="text"
                                               placeholder="Email or Username"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                               placeholder="Password" required>
                                        <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember_me"> Remember me
                                        </label>
                                    </div>
                                </form>
                                <div id="output"></div>
                            </div>
                            <div class="bottom text-center">
                                New here ? <a href="./html/signupForm.html"><b>Join Us</b></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
</body>