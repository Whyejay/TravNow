<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" >
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Sign up
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
//                            $('#output').html(message);

                        }
                        else {
                            // show error messages
                            alert(message);
//                            $('#output').html(message);


                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        //alert(errorThrown);
                        $('#output').html(response.responseText);
                    }
                });
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
            <li><a href="#about">About</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Travel <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Australia</a></li>
                    <li><a href="#">Brazil</a></li>
                    <li><a href="#">Spain</a></li>
                    <li><a href="#">Thailand</a></li>
                    <li><a href="#">Singapore</a></li>
                </ul>
            </li>
            <li><a href="./html/activity.html">Activities</a></li>
            <li><a href="./html/eat.html">Restaurants</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><p class="navbar-text">Already have an account?</p></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                <ul id="login-dp" class="dropdown-menu">
                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                Login via
                                <div class="social-buttons">
                                    <a href="./php/login.php?provider=Facebook" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                    <a href="./php/login.php?provider=Google" class="btn btn-gg"><i class="fa fa-google"></i> Google</a>
                                </div>
                                or
                                <form id="login_form" class="form" role="form" method="post" action="./php/login.php" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                        <label for="username" class="username" data-icon="u"> Your Email or Username </label>
                                        <input id="username" name="username" required="required" type="text"
                                               placeholder="Email or Username"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name ="password" class="form-control" id="password" placeholder="Password" required>
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