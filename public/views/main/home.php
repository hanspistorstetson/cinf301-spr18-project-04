<div class="container">
    <?php foreach ($this->tweets as $tweet) {
        echo $tweet;
    } ?>

    <script>
        $(".tweet").click(function() {
            window.location = $(this).find(".tweetLink").attr("href");
            console.log("Click")
            return false;
        })
    </script>
</div>