<?php
require_once 'php/check_logging.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TravelNow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body id="indexPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<link rel="stylesheet" type="text/css" href="css/activity.css">

<div class="jumbotron img-responsive container-fluid">
<div class="left col-md-1"></div>
    <div class="content col-md-10">
        <h1>Activities</h1>

        <h3>Check out the fun things to do!</h3>

        <div class="actcontent">
            <h2>Fishing @ The Sand Pumping Jetty</h2>
            <h4 class="actdate">07 April 2017</h4>
            <img id="myImg" src="img/fishing.jpg" alt="Sand Pumping Jetty @ Gold Coast Seaway">
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
       
	   
        <div class="actcontent">
            <p class="acttitle">Sky Diving</p>
            <p class="actdate">06 November 2016</p>
            <img id="myImg2" src="img/skydive.jpg" alt="Sky Diving @ Byron Bay">
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
            <img id="myImg3" src="img/surfing.jpg" alt="Learn surfing on Australian waters">
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
		<div class="right col-md-1"></div>
    </div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="container1">
	<h2>
	    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="logofooter"> <a href="index.php"><img src="img/logo.png" alt="logo" style="width:35px;height:35px;"></a>
                    </div>
                    <p>TravNow is a place to share your travelling experiences with peple all over the globe. You could also find out some 'secret' places that not many have visited before. Stay updated and trav now!</p>
                    <p><i class="fa fa-phone"></i> Phone (Australia) : +61 123 456 789</p>
                    <p><i class="fa fa-envelope"></i> E-mail : TravNow@INFS3202.com</p>

                </div>
                <div class="col-md-3 col-sm-6 footer-col">
                    <h6 class="heading7">GENERAL LINKS</h6>
                    <ul class="footer-ul">
                        <li><a href="#"> About us</a></li>
                        <li><a href="#"> Ranking</a></li>
                        <li><a href="#"> Promotions</a></li>
                        <li><a href="#"> Frequently Ask Questions</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer-col">
                    <h6 class="heading7">LATEST POST</h6>
                    <div class="post">
                        <p>California - Point Reyes National Seashore is a 71,028-acre park preserve located on the Point Reyes Peninsula in Marin County, California.<span>May 3,2017</span></p>
                        <p>Vietnam - Terraced rice paddies ring the Vietnamese countryside in bright green. <span>April 17,2017</span></p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 footer-col">
                    <h6 class="heading7">Social Media</h6>
                    <ul class="footer-social">
                        <li><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></li>
                        <li><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i></li>
                        <li><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer></h2>
    <!--footer start from here-->
	<div class="panel panel-default">
	<div class="panel-body" style="padding:0px;">
    <div class="f1">
        <div class="container">
            <div class="col-md-6">
                <p>© 2017 - All Rights with TravNow</p>
            </div>
            <div class="col-md-6">
                <ul class="bottom_ul">
                    <li><a href="#">TravNow.com</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Faq's</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Site Map</a></li>
                </ul>
            </div>
        </div>
    </div>
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
