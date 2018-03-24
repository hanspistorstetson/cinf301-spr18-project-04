<div class="row"> 
    <div class="col-sm-1"></div> 
    <div class="col-sm-11"> 
        <div class="card replies"> 
            <a class="tweetLink" href="?controller=tweets&action=show&tweet=<?php echo $this->reply->id?>"></a>
            <div class="card-body"> 
                <h2 class="card-title tweet-title"><?php echo $this->reply->user->displayName ?></h2>
                <h4 class="tweet-subtitle"><a href="https://twittercom/<?php echo $this->reply->user->handle?>" target="_blank">@<?php echo $this->reply->user->handle?></a></h4>
                <p class="card-text"><?php echo $this->reply->text?></p>
                <span class="tweetmeta"><i class="fas fa-retweet"></i><?php echo $this->reply->retweets?></span>
                <span class="tweetmeta"><i class="fas fa-star"></i><?php echo $this->reply->likes?></span>
                </div> 
            </div> 
        </div>
    </div>