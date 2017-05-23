<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/menu_logged.css">
    <script type="text/javascript">
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
<nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom:0px;" role="navigation">
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
        <div class="collapse navbar-collapse navbar-left" id="navbar1">
        <ul class="nav navbar-nav">
            <li class="home"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
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
        </div>
        <ul class="nav navbar-nav navbar-right">

            <li button onclick="window.location.href='post.php'" id="post_button" type="button" style="top:4px"
                class="btn btn-primary">Create new post</button></li>

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
    </div>
</nav>
</body>
</html>
