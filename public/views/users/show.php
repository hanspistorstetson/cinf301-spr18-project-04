<div class="col-3 px-1" id="sticky-sidebar">
    <div class="py-2 sticky-top">
        <div class="nav flex-column">
            <h1><?php echo $this->user->displayName ?></h1>
            <p>Followers: <?php echo $this->user->followers ?></p>
            <p>Friends: <?php echo $this->user->friends ?></p>
            <p>Total Tweets: <?php echo $this->user->tweets ?></p>
            <a href="https://twitter.com/<?php echo $this->user->handle ?>" target="_blank"><p>Link to User Page</p></a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-8" id="main">
            <?php
            $tweetview = new TwitterView\Renderer('views/templates/');
            foreach ($this->tweets as $tweet) {
                $tweetview->tweet = $tweet;p
                $tweetview->render("tweet.php");
            } ?>
        </div>

    </div>

    <script>
        $(".tweet").click(function() {
            window.location = $(this).find(".tweetLink").attr("href");
            console.log("Click")
            return false;
        })
    </script>

</div>