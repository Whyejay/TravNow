<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/menu_unlogged.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="js/facebook.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Normal login
            $('#login_form').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        var result = response.result;
                        var message = response.message;
                        alert(message);
                        if (result == 'success') {
                            // go to login page with the below message
                            window.location.replace("./html/pause.html");
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

            // Facebook login
            $('#facebook_button').click(function () {
                fbLogin();
            });
        });
        function showResult(str) {
            var search_menu = $('#livesearch');
            if (str.length == 0) {
                search_menu.empty();
                return;
            }
            $.ajax({
                url: 'php/livesearch.php?str=' + str,
                type: "post",
                dataType: 'json',
                success: function (response) {
                    search_menu.empty();
                    $.each(response, function () {
                        search_menu.append('<li><a href="content.php?id=' + this.id + '">' + this.title + '</a></li><hr>');
                    });
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
    </script>
</head>
<body>
<nav class="navbar navbar-default" style="margin-bottom: 0px;" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
        <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="./index.php" style="padding:0;"><img src="./img/logo.png" style="height:100px;width:60px;" alt="Logo Picture"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar1">

        <ul class="nav navbar-nav">
            <li class="home"><a href="./index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="travel.php">Travel</a></li>
            <li><a href="activity.php">Activities</a></li>
            <li><a href="eat.php">Restaurants</a></li>
        </ul>

        <div class="col-md-4 pull-left">
            <form class="navbar-form" role="search" id="search-form">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" onkeyup="showResult(this.value)">
                    <span class="input-group-addon">
                    <i class="glyphicon glyphicon-search"></i>
                    </span>
                </div>

            </form>
            <div id="livesearch" style="background-color: rgba(255,255,255,0.85);list-style-type: none;margin: 10;min-width: 250px;position: absolute;top: 42px;z-index: 100;padding-left: 15px;padding-right:5px;text-align: left;line-height: 150%;"></div>

        </div>


        <ul class="nav navbar-nav navbar-right">


            <li button onclick="window.location.href='signupForm.php?action=login'" id="post_button" type="button"
                style="top:7px" class="btn btn-primary">Create new post</button></li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                <ul id="login-dp" class="dropdown-menu">
                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                Login via
                                <div class="social-buttons" ``>
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
                                New here ? <a href="signupForm.php?action=signup"><b>Join Us</b></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>

        </ul>
        </div>
    </div>
</nav>
</body>
</html>
