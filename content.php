<head>
    <title>TravelNow</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
require_once 'php/check_logging.php';
require_once 'php/functions.php';
require_once 'php/Parsedown.php';
$post_id = $_REQUEST['id'];
$post = get_post_by_id($post_id);
$username = $post['user_username'];
$title = $post['title'];
$content = $post['content'];
$Parsedown = new Parsedown();
$content = $Parsedown->text($content);
?>
<div class="blog-header">
    <div class="container">
        <h1 id="title" class="blog-title"> <?php echo $title ?></h1>
        <p class="blog-post-meta">Posted by <a href="#"><?php echo $username ?></a></p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div id="content" class="blog-post"></div>
            <?php echo $content ?>
        </div><!-- /.row -->

    </div><!-- /.container -->
</div>

