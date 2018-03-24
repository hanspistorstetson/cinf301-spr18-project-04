<div class="container">
    <h1 class="text-center">Latest Tweets!</h1>
    <?php
    $tweetview = new TwitterView\Renderer('views/templates/');
    foreach ($this->tweets as $tweet) {
        $tweetview->tweet = $tweet;
            $tweetview->render("tweet.php");
    } ?>

    <script>
        $(".tweet").click(function() {
            window.location = $(this).find(".tweetLink").attr("href");
            console.log("Click")
            return false;
        })
    </script>
</div>