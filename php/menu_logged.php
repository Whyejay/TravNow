<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" alt="Logo Picture"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="home"><a href="../index.php">Home</a></li>
            <li><a href="#about">About</a>

            </li>
            <li><a href="../html/travel.html">Travel</a>
                <ul>
                    <li><a href="#">Australia</a></li>
                    <li><a href="#">Brazil</a></li>
                    <li><a href="#">China</a></li>
                    <li><a href="#">Denmark</a></li>
                    <li><a href="#">Egypt</a></li>
                </ul>
            </li>
            <li><a href="../html/activity.html">Activities</a></li>
            <li><a href="../html/eat.html">Restaurants</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../html/loginForm.html"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'] ?> </a>
            </li
        </ul>
    </div>
</nav>