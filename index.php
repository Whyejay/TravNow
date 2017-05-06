<html lang="en">
<head>
    <title>TravelNow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body id="indexPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<link rel="stylesheet" type="text/css" href="css/index.css">
<?php
define('SECRET_KEY', 'KhoaUQ_95');
include_once 'php/functions.php';
$logged = check_logged();
if ($logged){
    include_once 'php/menu_logged.php';
}
else{
    include_once 'php/menu_unlogged.php';
}
?>
<div class="jumbotron text-center img-responsive container-fluid">
    <a href="#"><h1>Going Places</h1></a>
    <p>To travel is to live</p>
</div>
<div class="middle text-center container-fluid bg-grey">
    <h1>Join us to share your greatest experience and memories!</h1>
    <div class="row text-center slideanim">

        <div class="travel text-center img-responsive container-fluid col-sm-4">
            <a href="./html/travel.html"><h2>Travel</h2></a>

        </div>
        <div class="eat text-center img-responsive container-fluid col-sm-4">
            <a href="./html/eat.html"><h2>Savour</h2></a>
        </div>
        <div class="relax text-center img-responsive container-fluid col-sm-4">
            <a href="./html/activity.html"><h2>Activity</h2></a>
        </div>
    </div>

</div>
<div class="bottom text-center container-fluid bg-grey">
    <p>#1 Trending Place</p>
    <hr></hr>
    <div class="trend text-center img-responsive container-fluid col-sm-10">
    </div>
</div>

<div class="footer_container">
    <div class="container">
        <strong>Title</strong>
        <ul>
            <li>Adresse</li>
            <li>Tlf: Phone</li>
            <li>Zipcode/City</li>
            <li>Mail: Email</li>
        </ul>
    </div>
    <div class="container">
        <strong>Links</strong>
        <ul>
            <li>Om skolen</li>
            <li>Elever</li>
            <li>Kalender</li>
            <li>Galleri</li>
            <li>For&aelig;ldre</li>
            <li>Fag</li>
        </ul>
    </div>
    <div class="container">
        Your FB/Twitter things
    </div>
</div>
​

</body>


</html>