<div class="card tweet">
    <a class="tweetLink" href="?controller=tweets&action=show&tweet=<?php echo $this->tweet->id?>"></a>
    <div class="card-body">
        <h2 class="card-title tweet-title">  <? echo $this->tweet->user->displayName?>  </h2>
        <h4 class="tweet-subtitle"><a href="https://twitter.com/<? echo $this->tweet->user->handle?>" target="_blank">@<?php echo $this->tweet->user->handle?></a></h4>
        <p class="card-text"><?php echo $this->tweet->text ?></p>
        <span class="tweetmeta"><i class="fas fa-retweet"></i><?php echo $this->tweet->retweets ?></span>
        <span class="tweetmeta"><i class="fas fa-star"></i>   <?php echo $this->tweet->likes ?></span>
    </div>
</div>