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
<link rel="stylesheet" type="text/css" href="css/activity.css">

<div class="jumbotron img-responsive container-fluid">
    <div class="content">
        <h1>Activities</h1>

        <p>Check out the fun things to do!</p>

        <div class="actcontent">
            <p class="acttitle">Fishing @ The Sand Pumping Jetty</p>
            <p class="actdate">07 April 2017</p>
            <img id="myImg" src="../img/fishing.jpg" alt="Sand Pumping Jetty @ Gold Coast Seaway">
            <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
            <p class="actcaption">Fishing - This spot is on fire all year round for the seasoned fisherman. Resident expert Herb says to try and aim for tailor fish throughout the winter, while the lead-up to summer is a great time for nice flathead, dart, bream, whiting and even the odd big jewfish. “It’s a great spot to fish right now actually, especially with the early spring weather. It’s a lovely spot to spend the day even if you don’t catch a thing — not that that’s an option.”</p>
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=253571025046701"
                    width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div>
        <hr>
        <div class="actcontent">
            <p class="acttitle">Sky Diving</p>
            <p class="actdate">06 November 2016</p>
            <img id="myImg2" src="../img/skydive.jpg" alt="Sky Diving @ Byron Bay">
            <div id="myModal2" class="modal2">

                <!-- The Close Button -->
                <span class="close" onclick="document.getElementById('myModal2').style.display='none'">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img02">

                <!-- Modal Caption (Image Text) -->
                <div id="caption2"></div>
            </div>
            <p class="actcaption">Skydive at Byron Bay’s closest beach skydive for the ultimate adrenalin rush. You’ll drop from an extreme altitude of up to 14,000ft and freefall at over 200 km/hr for up to an insane 60 seconds, then float under canopy over Byron Bay for 5-7 minutes soaking up spectacular beach and hinterland views all the way to Brisbane, the Gold Coast and beyond.</p>
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=253571025046701"
                    width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div>
        <hr>
        <div class="actcontent">
            <p class="acttitle">Surfing @ Gold Coast Surf School</p>
            <p class="actdate">02 November 2016</p>
            <img id="myImg3" src="../img/surfing.jpg" alt="Learn surfing on Australian waters">
            <div id="myModal3" class="modal3">

                <!-- The Close Button -->
                <span class="close" onclick="document.getElementById('myModal3').style.display='none'">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img03">

                <!-- Modal Caption (Image Text) -->
                <div id="caption3"></div>
            </div>
            <p class="actcaption">Surf school on the Gold Coast. There is no better feeling than surfing along a beautifully shaped wave on a crystal clear day. Our aim is for our surfing instructors to provide our clients with a high quality introduction to surfing that is safe, professional and fun. There is nothing we like more, than seeing the thrill people experience when they stand up for the first time. This is why we provide our clients with easy to use techniques, low student to coach ratios and the ideal location. We want your first surf to be a surf in paradise! Click the link below to find out more! <a href="http://www.surfinparadise.com.au/about.asp">http://www.surfinparadise.com.au/about.asp</a></p>
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=253571025046701"
                    width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
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
