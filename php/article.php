<?php
include_once 'Parsedown.php';
$Parsedown = new Parsedown();

// connect database
require_once 'connectMySQL.php';
$database = new MySQLDatabase();
$db_connection = $database->connect();

// process
$last_id = $_REQUEST['last_id'];
$selectQuery = "SELECT * FROM post WHERE post_id < '$last_id' ORDER BY post_id DESC LIMIT 2";
$select = $db_connection->query($selectQuery);
while ($post = $select->fetch_assoc()) {
    $content = $Parsedown->text($post['content']);
    $post_id = $post['post_id'];
    $title = $post['title'];
    $username = $post['user_username'];
    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $image);
    $first_image_src = $image['src'];
    $text_without_image = preg_replace("/<img[^>]+\>/i", "", $content);
    $description = tease($text_without_image);
    ?>
    <div class="row" id="<?php echo $post_id ?>">
        <div class="col-sm-4"><a href="#" class=""><img src="<?php echo $first_image_src ?>" class="img-responsive"></a>
        </div>
        <div class="col-sm-8">
            <h3 class="title"><?php echo $title ?></h3>
            <p class="text-muted"><span class="glyphicon glyphicon-lock"></span> Available Exclusively for Premium
                Members</p>
            <p><?php echo $description ?></p>
            <p class="text-muted">Presented by <a href="#"><?php echo $username ?></a></p>
            <button onclick="window.location.href='https://infs3202-c25wl.uqcloud.net/travnow/content.php?id=<?php echo $post_id ?>'" id="btnReadmore" type="submit" class="btn btn-primary">Read More</button>
        </div>
    </div>
    <hr>
    <?php
}
$db_connection->close();
function tease($body, $sentencesToDisplay = 4) {
    $nakedBody = preg_replace('/\s+/',' ',strip_tags($body));
    $sentences = preg_split('/(\.|\?|\!)(\s)/',$nakedBody);

    if (count($sentences) <= $sentencesToDisplay)
        return $nakedBody;

    $stopAt = 0;
    foreach ($sentences as $i => $sentence) {
        $stopAt += strlen($sentence);

        if ($i >= $sentencesToDisplay - 1)
            break;
    }

    $stopAt += ($sentencesToDisplay * 2);
    return trim(substr($nakedBody, 0, $stopAt));
}
?>