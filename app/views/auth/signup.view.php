<?php require views_path("includes/header"); ?>

<div class="container text-center border col-lg-4 col-md-8 mt-4 p-4">
    <h3><i class="fa fa-user pe-2"></i>User signup</h3>
    <h5 class="mb-5"><?=APP_NAME;?></h5>

    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <div class="alert alert-danger"><?=$error;?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="" method="post">
        <div class="input-group mb-4">
            <span class="input-group-text" style="min-width: 100px;">Username</span>
            <input
                    type="text"
                    name="username"
                    value="<?=set_value('username');?>"
                    class="form-control <?=!empty($errors['username'])?'border-danger':'';?>"
                    placeholder="Type your name" aria-label="Username">
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text" style="min-width: 100px;">Email</span>
            <input
                    type="email"
                    name="email"
                    value="<?=set_value('email');?>"
                    class="form-control  <?=!empty($errors['email'])?'border-danger':'';?>"
                    placeholder="Type your email" aria-label="Email">
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text" style="min-width: 100px;">Password</span>
            <input type="text" name="password" class="form-control  <?=!empty($errors['password'])?'border-danger':'';?>" placeholder="Type your password" aria-label="Password">
        </div>
        <div class="input-group mb-5">
            <span class="input-group-text" style="min-width: 100px;">Confirm</span>
            <input type="text" name="confirm" class="form-control  <?=!empty($errors['confirm'])?'border-danger':'';?>" placeholder="Confirm your password" aria-label="Password">
        </div>

        <div>
            <button class="btn btn-primary">Create</button>
            <button class="btn btn-secondary">Cancel</button>
        </div>
    </form>
</div>


<?php require views_path("includes/footer"); ?>


