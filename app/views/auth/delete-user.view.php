<?php require views_path("includes/header"); ?>

<div class="container text-center border col-lg-4 col-md-8 mt-4 p-4">
    <h3><i class="fa fa-user pe-2"></i>Delete User</h3>
    <h5 class="mb-5"><?=APP_NAME;?></h5>
    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <div class="alert alert-danger"><?=$error;?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(is_array($row) && $row['deletable']): ?>
        <h6 class="mb-5 alert alert-danger">Are you sure you want to delete this User?</h6>

        <form action="" method="post">
            <div class="input-group mb-4">
                <span class="input-group-text" style="min-width: 100px;">Username</span>
                <input  type="text" name="username" disabled
                        value="<?=set_value('username', $row['username']);?>"
                        class="form-control <?=!empty($errors['username'])?'border-danger':'';?>"
                        placeholder="Type your name" aria-label="Username"
                >
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" style="min-width: 100px;">Email</span>
                <input  type="email" name="email" disabled
                        value="<?=set_value('email', $row['email']);?>"
                        class="form-control  <?=!empty($errors['email'])?'border-danger':'';?>"
                        placeholder="Type your email" aria-label="Email"
                >
            </div>

            <div>
                <button class="btn btn-danger">Delete</button>

                <a href="index.php?page_name=admin&tab=users">
                    <button type="button" class="btn btn-secondary">Cancel</button>
                </a>
            </div>
        </form>
    <?php else: ?>
        <?php if(is_array($row) && !$row['deletable']): ?>
            <div class="alert alert-danger">You can not delete this user!</div>
            <a href="index.php?page_name=home" class="mt-4">
                <button type="button" class="btn btn-secondary">Back on main page</button>
            </a>
        <?php else: ?>
            <div class="alert alert-danger">User not found in database.</div>
            <a href="index.php?page_name=admin&tab=users">
                <button type="button" class="btn btn-secondary">Back on main page</button>
            </a>
        <?php endif; ?>
    <?php endif; ?>
</div>


<?php require views_path("includes/footer"); ?>



