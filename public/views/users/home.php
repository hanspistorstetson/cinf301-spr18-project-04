<div class="container">
    <h1 class="user-heading">Search for Users!</h1>

    <form method="GET">
        <input type="hidden" name="controller" value="users" />
        <input type="hidden" name="action" value="home" />
        <input class="form-control twitter-form-control" type="search" name="query" placeholder="Search for a User" id="user-search-input">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="row text-center">
        <?php
            foreach ($this->users as $user) {
                echo $user;
            }
        ?>

    </div>

    <script>
        $(".userCard").click(function() {
            window.location = $(this).find(".userLink").attr("href");
            console.log("Click")
            return false;
        })
    </script>


</div>