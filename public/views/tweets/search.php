<div class="container">
    <h1 class="text-center">Tweet Search</h1>
    <form method="GET">
        <input type="hidden" name="controller" value="tweets" />
        <input type="hidden" name="action" value="search" />
        <input class="form-control twitter-form-control" type="search" name="query" placeholder="Search for a Tweet" id="user-search-input">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


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