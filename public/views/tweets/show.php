<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <?php
            $tweetview = new TwitterView\Renderer('views/templates/');
                $tweetview->tweet = $this->tweet;
                $tweetview->render("tweet.php");
            ?>
        </div>
    </div>


    <?php
    $replyview = new TwitterView\Renderer('views/templates/');
    foreach ($this->replies as $reply) {
        $replyview->reply = $reply;
        $replyview->render("reply.php");
    } ?>

</div>