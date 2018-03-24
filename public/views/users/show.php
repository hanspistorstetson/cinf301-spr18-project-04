<div class="container">
    <?php
    $tweetview = new TwitterView\Renderer('views/templates/');
    foreach ($this->tweets as $tweet) {
        $tweetview->tweet = $tweet;
        $tweetview->render("tweet.php");
    } ?>
</div>