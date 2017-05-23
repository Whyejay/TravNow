<?php
require_once 'php/check_logging.php';
require_once 'php/functions.php';
require_once 'php/Parsedown.php';
session_start();
$post_id = $_REQUEST['id'];
$user_id = $_SESSION['id'];
$post = get_post_by_id($post_id);
$username = $post['user_username'];
$title = $post['title'];
$num_like = $post['num_like'];
$content = $post['content'];
$Parsedown = new Parsedown();
$content = $Parsedown->text($content);
$liked = check_liked($user_id, $post_id);
?>
<html>
<head>
    <title>TravelNow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/content.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var like_button = $('#like_button');
            if (<?php echo (int)$liked ?>) {
                like_button.addClass("liked");
            }
            else {
                like_button.addClass("not-liked");
            }
            like_button.click(function () {
                $(this).toggleClass("not-liked liked");
                var like = $(this).hasClass("liked");
                var el = $('#num_like');
                var num = parseInt(el.text());
                var action = "";
                if (like) {
                    el.text(num + 1);
                    action = "like";
                }
                else {
                    el.text(num - 1);
                    action = "unlike";
                }
                var data_array = {};
                data_array['action'] = action;
                data_array['post_id'] = <?php echo $post_id?>;
                var data_json = JSON.stringify(data_array);
                $.ajax({
                    url: 'php/like_unlike.php',
                    type: "post",
                    data: data_json
                });
            });

            var share_button = $('#share_button');
            share_button.click(function (){
              FB.ui({
                method: 'share',
                display: 'popup',
                href: window.location.href,
                },
                function(response){});
            });
        });
    </script>
</head>
<body>

<div class="blog-header col-md-12">
    <div class="container col-md-12" style="margin-top:50px">
        <h1 id="title" class="blog-title"> <?php echo $title ?></h1>
        <p class="blog-post-meta">Posted by <a href="#"><?php echo $username ?></a></p>
    </div>
</div>
<hr>
<div class="container col-md-9">
    <div class="row">
        <div class="col-md-1">
            <span class='toggle fa' id="like_button"></span>
            </br>
            <div style="display: inline; font-size:30px;" id="num_like"><?php echo $num_like ?></div>
            <div id="share_button" class="btn btn-success clearfix">Share</div>
        </div>
        <div class="col-md-8 blog-main img-responsive">
            <!--            <div id="content" class="blog-post"></div>-->
            <?php echo $content ?>
        </div>
    </div>
</div>
<div class="container col-md-3">
    
</div>
</body>
</html>
