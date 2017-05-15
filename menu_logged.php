<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/menu_logged.css">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><img src="./img/logo.png" alt="Logo Picture"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="home"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a>

            </li>
            <li><a href="travel.php">Travel</a></li>
            <li><a href="activity.php">Activities</a></li>
            <li><a href="eat.php">Restaurants</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
		<li button onclick="window.location.href='post.php'" id="post_button" type="button" style="top:4px" class="btn btn-primary">Create new post</button></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span>
                    <strong><?php echo $_SESSION['username'] ?></strong>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="navbar-login">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="text-center">
                                        <span class="glyphicon glyphicon-user icon-size"></span>
                                    </p>
                                </div>
                                <div class="col-lg-8">
                                    <p class="text-left"><strong><?php echo $_SESSION['username'] ?></strong></p>
                                    <p class="text-left">
                                        <a href="#" class="btn btn-primary btn-block btn-sm">Profile</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="divider navbar-login-session-bg"></li>
                    <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                    <li class="divider"></li>
                    <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                    <li class="divider"></li>
                    <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
                    <li class="divider"></li>
                    <li><a href="#">Favourites Snippets <span class="glyphicon glyphicon-heart pull-right"></span></a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="./php/logout.php">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
</body>