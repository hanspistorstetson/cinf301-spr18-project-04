<div class="col-lg-3 col-md-4 col-xs-6 userCard"> 
    <a href="#" class="d-block mb-4"> 
        <div class="card h-50"> 
            <a class="userLink" href="?controller=users&action=show&user=  <?php echo $this->user->id ?> "></a>
            <img class="card-img-top h-50" src=" <?php echo $this->user->profileImg ?>" alt="Card image cap">
            <div class="card-body"> 
                <h2 class="card-title tweet-title">  <?php echo $this->user->displayName ?></h2>
                <h4 class="tweet-subtitle"><a href="https://twittercom/ <?php echo $this->user->handle ?>" target="_blank">@  <?php echo $this->user->handle ?></a></h4>
                <p class="card-text">  <?php echo $this->user->text ?></p>
            </div>
        </div>
    </a>
</div>