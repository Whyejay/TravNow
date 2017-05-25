<?php
require_once 'php/check_logging.php';
?>
<html lang="en">
<head>
    <title>TravelNow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    (function() {

    function Slideshow( element ) {
        this.el = document.querySelector( element );
        this.init();
    }

    Slideshow.prototype = {
        init: function() {
            this.wrapper = this.el.querySelector( ".slider-wrapper" );
            this.slides = this.el.querySelectorAll( ".slide" );
            this.previous = this.el.querySelector( ".slider-previous" );
            this.next = this.el.querySelector( ".slider-next" );
            this.index = 0;
            this.total = this.slides.length;
            this.timer = null;

            this.action();
            this.stopStart();
        },
        _slideTo: function( slide ) {
            var currentSlide = this.slides[slide];
            currentSlide.style.opacity = 1;

            for( var i = 0; i < this.slides.length; i++ ) {
                var slide = this.slides[i];
                if( slide !== currentSlide ) {
                    slide.style.opacity = 0;
                }
            }
        },
        action: function() {
            var self = this;
            self.timer = setInterval(function() {
                self.index++;
                if( self.index == self.slides.length ) {
                    self.index = 0;
                }
                self._slideTo( self.index );

            }, 3000);
        },
        stopStart: function() {
            var self = this;
            self.el.addEventListener( "mouseover", function() {
                clearInterval( self.timer );
                self.timer = null;

            }, false);
            self.el.addEventListener( "mouseout", function() {
                self.action();

            }, false);
        }


    };

    document.addEventListener( "DOMContentLoaded", function() {

        var slider = new Slideshow( "#main-slider" );

    });


})();
</script>
</head>
<body id="indexPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<link rel="stylesheet" type="text/css" href="css/about.css">

<div class="jumbotron text-center img-responsive container-fluid">
        <div class="container col-md-4">
            <h2>About Us</h2>
            <small>
            We are etc etc etc
            </small>
        </div>
            <div class="container cold-md-4">
                <img src="img/about.jpg" style="height:400px;width:270px;">
            </div>
</div>
    <div class="slider" id="main-slider"><!-- outermost container element -->
            <div class="slider-wrapper"><!-- innermost wrapper element -->
                <img src="img/slide1.jpg" alt="First" class="slide" /><!-- slides -->
                <img src="img/slide2.jpg" alt="Second" class="slide" />
                <img src="img/slide3.jpg" alt="Third" class="slide" />
            </div>
    </div>

​<br>
<br>
<br>
<br>
<br>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 footer-col">
                <div class="logofooter"><a href="index.php"><img src="img/logo.png" alt="logo"
                                                                 style="width:35px;height:35px;"></a>
                </div>
                <p>TravNow is a place to share your travelling experiences with peple all over the globe. You could also
                    find out some 'secret' places that not many have visited before. Stay updated and trav now!</p>
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
                    <p>California - Point Reyes National Seashore is a 71,028-acre park preserve located on the Point
                        Reyes Peninsula in Marin County, California.<span>May 3,2017</span></p>
                    <p>Vietnam - Terraced rice paddies ring the Vietnamese countryside in bright green. <span>April 17,2017</span>
                    </p>
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

</body>


</html>
