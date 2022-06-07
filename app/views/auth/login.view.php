<?php require views_path("includes/header"); ?>

<div class="container text-center border col-lg-4 col-md-8 d-flex justify-content-center align-items-center flex-column
    p-5 shadow-lg" style="transform: translateY(50%)">
    <h3><i class="fa fa-user pe-2"></i>User login</h3>
    <h5 class="mb-5"><?=APP_NAME;?></h5>

    <form action="" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text bg-primary text-white" style="min-width: 100px;">Email</span>
            <input type="email" name="email" class="form-control" placeholder="Type your email" aria-label="Email">
        </div>
        <div class="input-group mb-5">
            <span class="input-group-text bg-primary text-white" style="min-width: 100px;">Password</span>
            <input type="text" name="password" class="form-control" placeholder="Type your password" aria-label="Password">
        </div>

        <div>
            <button class="btn btn-primary">Enter</button>
            <button class="btn btn-secondary">Signup</button>
        </div>
    </form>
</div>


<?php require views_path("includes/footer"); ?>



