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
    <script src="js/showdown.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var text = "Markdown *rocks*.";
            var converter = new showdown.Converter();
            //   var html = converter.makeHtml(text);
            var html = converter.makeHtml(text);
            alert(html);
        });
    </script>
</head>
<body>
<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
    </div>
</div>
<div class="container">

    <div class="row">
        <div class="col-sm-8 blog-main">
            <div id="content" class="blog-post">


            </div>
        </div><!-- /.row -->

    </div><!-- /.container -->
</body>
</html>
