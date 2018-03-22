<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <?php echo $this->tweet ?>
        </div>
    </div>

    <?php
        foreach ($this->replies as $reply) {
            echo $reply;
        }
    ?>
</div>