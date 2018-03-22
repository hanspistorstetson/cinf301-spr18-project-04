<div class="container">
    <?php foreach ($this->tweets as $tweet) {
        echo '<div class="card tweet">';
            echo '<div class="card-body">';
                echo '<h4 class="card-title>"' . $tweet["user"]["screen_name"] . "</h4>";
                echo "<p class='card-text'>" . $tweet["full_text"] . "</p>";
            echo '</div>';
        echo '</div>';
    } ?>
</div>