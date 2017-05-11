<?php
require_once 'php/check_logging.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TravelNow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body id="indexPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<link rel="stylesheet" type="text/css" href="css/eat.css">

<div class="jumbotron img-responsive container-fluid">
    <div class="content">
        <h1>Restaurants</h1>

        <p>Check here on the latest places to have the best meal in the world!</p>

        <div class="eatcontent">
            <p class="eattitle">The Boathouse at Rocketts Landing</p>
            <p class="eatdate">19 May 2016</p>
            <img id="myImg" src="img/eat1.jpg" alt="The Boathouse at Rocketts Landing, 4708 Old Main St, Richmond, VA 23231, USA">
            <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
            <p class="eatcaption">Experience everything that is unique about Richmond at our Rocketts Landing location: a vibrant city among luscious greenery and calming water. Not to mention expertly prepared local seafood, pizza, and more.</p>
            <button type="button">Read More</button>
            <button type="button">fblike</button>
        </div>
        <hr>
        <div class="eatcontent">
            <p class="eattitle">Chicken Institute</p>
            <p class="eatdate">24 March 2016</p>
            <img id="myImg2" src="img/eat2.jpg" alt="Chicken Institute, 61 Fitzroy St, Surry Hills NSW 2010">
            <div id="myModal2" class="modal2">

                <!-- The Close Button -->
                <span class="close" onclick="document.getElementById('myModal2').style.display='none'">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img02">

                <!-- Modal Caption (Image Text) -->
                <div id="caption2"></div>
            </div>
            <p class="eatcaption">Don’t let the name fool you. Chicken Institute is not a chicken-only butcher in your local shopping centre, nor is it a school for poultry upskilling. It’s a Korean restaurant on Fitzroy Street serving up the surprisingly excellent combination of fried chicken in buckets, bibimbaps and milkshakes.</p>
            <button type="button">Read More</button>
            <button type="button">fblike</button>
        </div>
        <hr>
        <div class="eatcontent">
            <p class="eattitle">Longrain</p>
            <p class="eatdate">22 March 2016</p>
            <img id="myImg3" src="img/eat3.jpg" alt="Longrain, 40-44 Little Bourke St Melbourne, VIC 3000">
            <div id="myModal3" class="modal3">

                <!-- The Close Button -->
                <span class="close" onclick="document.getElementById('myModal3').style.display='none'">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img03">

                <!-- Modal Caption (Image Text) -->
                <div id="caption3"></div>
            </div>
            <p class="eatcaption">A decade and a half since its arrival transformed Sydney's understanding of high-end Thai cuisine, Longrain remains a buzzing destination stalwart on the local dining scene. It isn’t hard to see why. The interior is fun but fancy enough, the service warm and accommodating. And the food? Well, after a long-overdue return visit, we can tell you Longrain is still kicking ass in that department, too.
            </p>
            <button type="button">Read More</button>
            <button type="button">fblike</button>
        </div>
    </div>
</div>
</body>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');
    var modal2 = document.getElementById('myModal2');
    var modal3 = document.getElementById('myModal3');
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var img2 = document.getElementById('myImg2');
    var img3 = document.getElementById('myImg3');
    var modalImg = document.getElementById("img01");
    var modalImg2 = document.getElementById("img02");
    var modalImg3 = document.getElementById("img03");
    var captionText = document.getElementById("caption");
    var captionText2 = document.getElementById("caption2");
    var captionText3 = document.getElementById("caption3");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    img2.onclick = function(){
        modal2.style.display = "block";
        modalImg2.src = this.src;
        captionText2.innerHTML = this.alt;
    }
    img3.onclick = function(){
        modal2.style.display = "block";
        modalImg2.src = this.src;
        captionText2.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close")[0];
    var span3 = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    span2.onclick = function() {
        modal.style.display = "none";
    }
    span3.onclick = function() {
        modal.style.display = "none";
    }

</script>

</html>
