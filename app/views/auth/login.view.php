<?php require views_path("includes/header"); ?>

<div class="container text-center border col-lg-4 col-md-8 d-flex justify-content-center align-items-center flex-column
    p-5 shadow-lg" style="transform: translateY(50%)">
    <h3><i class="fa fa-user pe-2"></i>User login</h3>
    <h5 class="mb-5"><?=APP_NAME;?></h5>

    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <div class="alert alert-danger"><?=$error;?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text bg-primary text-white" style="min-width: 100px;">Email</span>
            <input  type="email" name="email"
                    value="<?=set_value('email');?>"
                    class="form-control  <?=!empty($errors['email'])?'border-danger':'';?>"
                    placeholder="Type your email"
            >
        </div>
        <div class="input-group mb-5">
            <span class="input-group-text bg-primary text-white" style="min-width: 100px;">Password</span>
            <input  type="text" name="password"
                    value="<?=set_value('password');?>"
                    class="form-control  <?=!empty($errors['password'])?'border-danger':'';?>"
                    placeholder="Type your password"
            >
        </div>

        <div>
            <button class="btn btn-primary">Enter</button>
            <a href="<?=ROOT;?>index.php?page_name=signup">
                <button type="button" class="btn btn-secondary">Signup</button>
            </a>
        </div>
    </form>
</div>


<?php require views_path("includes/footer"); ?>



