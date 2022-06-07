<?php require views_path("includes/header"); ?>

<div class="container text-center border col-lg-4 col-md-8 mt-4 p-4">
    <h3><i class="fa fa-user pe-2"></i>User signup</h3>
    <h5 class="mb-5"><?=APP_NAME;?></h5>

    <form action="" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" style="min-width: 100px;">Username</span>
            <input type="text" name="username" class="form-control" placeholder="Type your name" aria-label="Username">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" style="min-width: 100px;">Email</span>
            <input type="email" name="email" class="form-control" placeholder="Type your email" aria-label="Email">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" style="min-width: 100px;">Password</span>
            <input type="text" name="password" class="form-control" placeholder="Type your password" aria-label="Password">
        </div>
        <div class="input-group mb-5">
            <span class="input-group-text" style="min-width: 100px;">Confirm</span>
            <input type="text" name="confirm" class="form-control" placeholder="Confirm your password" aria-label="Password">
        </div>

        <div>
            <button class="btn btn-primary">Create</button>
            <button class="btn btn-secondary">Cancel</button>
        </div>
    </form>
</div>


<?php require views_path("includes/footer"); ?>


