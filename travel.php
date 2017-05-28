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
<link rel="stylesheet" type="text/css" href="css/travel.css">

<div class="jumbotron img-responsive container-fluid">
<div class="left col-md-1"></div>
    <div class="content col-md-10">
        <h1>Travel</h1>

        <h3>Check here on the latest places to go!</h3>

        <div class="travcontent">
            <h2>The Adventures of Nicholas</h2>
            <h4 class="travdate">13 April 2017</h4>
            <img id="myImg" src="img/pointreyes.jpg" alt="Point Reyes, California">
            <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
            <p class="travcaption">Point Reyes National Seashore is a 71,028-acre park preserve located on the Point Reyes Peninsula in Marin County, California. As a national seashore, it is maintained by the US National Park Service as an important nature preserve.</p>
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=253571025046701"
                    width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>


            <div class="travcontent">
                <p class="travtitle">Sebastian's travelogue</p>
                <p class="travdate">12 March 2017</p>
                <img id="myImg2" src="img/curacao.jpg" alt="Curacao, Netherlands">
                <div id="myModal2" class="modal2">

                    <!-- The Close Button -->
                    <span class="close" onclick="document.getElementById('myModal2').style.display='none'">&times;</span>

                    <!-- Modal Content (The Image) -->
                    <img class="modal-content" id="img02">

                    <!-- Modal Caption (Image Text) -->
                    <div id="caption2"></div>
                </div>
                <p class="travcaption">Willemstad is the capital city of Curaçao, a Dutch Caribbean island. It’s known for its old town center, with pastel-colored colonial architecture. The floating Queen Emma Bridge connects the Punda and Otrobanda neighborhoods across Sint Anna Bay. By the water is the 19th-century Rif Fort, now housing a shopping center. City restaurants serve dishes influenced by the island's mostly Dutch and Afro-Caribbean cuisines.</p>
                <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=253571025046701"
                        width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>

            <hr>
            <div class="travcontent">
                <p class="travtitle">Crystal's journey to the east</p>
                <p class="travdate">25 December 2016</p>
                <img id="myImg3" src="img/vietnam.jpg" alt="Sapa, Vietnam">
                <div id="myModal3" class="modal3">

                    <!-- The Close Button -->
                    <span class="close" onclick="document.getElementById('myModal3').style.display='none'">&times;</span>

                    <!-- Modal Content (The Image) -->
                    <img class="modal-content" id="img03">

                    <!-- Modal Caption (Image Text) -->
                    <div id="caption3"></div>
                </div>
                <p class="travcaption">Terraced rice paddies ring the Vietnamese countryside in bright green. The crop, a staple of Southeast Asia, has been grown in Vietnam for thousands of years.</p>
                <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=253571025046701"
                        width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>
        <div class="right col-md-1"></div>
    </div>
	</div>
	</div>
    <br>
    <br>
    <br>
    <br>
    <br>


    <footer style="height:240px;">
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
    </footer>
    <!--footer start from here-->

    <div class="f1"">
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
