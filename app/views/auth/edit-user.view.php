<?php require views_path("includes/header"); ?>

<div class="container text-center border col-lg-4 col-md-8 mt-4 p-4">
    <h3><i class="fa fa-user pe-2"></i>Edit User</h3>
    <h5 class="mb-5"><?=APP_NAME;?></h5>

    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <div class="alert alert-danger"><?=$error;?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(is_array($row)): ?>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-5">
                <img class="w-100" src="<?=$row['image'];?>" alt="user-photo">
                <input type="file" name="image" class="form-control" placeholder="User image">
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text" style="min-width: 100px;">Username</span>
                <input  type="text" name="username"
                        value="<?=set_value('username', $row['username']);?>"
                        class="form-control <?=!empty($errors['username'])?'border-danger':'';?>"
                        placeholder="Type your name" aria-label="Username"
                >
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" style="min-width: 100px;">Email</span>
                <input  type="email" name="email"
                        value="<?=set_value('email', $row['email']);?>"
                        class="form-control  <?=!empty($errors['email'])?'border-danger':'';?>"
                        placeholder="Type your email" aria-label="Email"
                >
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" style="min-width: 100px;">Gender</span>
                <select name="gender" class="form-control  <?=!empty($errors['gender'])?'border-danger':'';?>">
                    <option><?=$row['gender'];?></option>
                    <option>male</option>
                    <option>female</option>
                </select>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" style="min-width: 100px;">Role</span>
                <select name="role" class="form-control  <?=!empty($errors['role'])?'border-danger':'';?>">
                    <option><?=$row['role'];?></option>
                    <?php if(Auth::get('role') == 'admin'): ?>
                        <option>admin</option>
                    <?php endif; ?>
                    <option>supervisor</option>
                    <option>cashier</option>
                    <option>user</option>
                </select>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" style="min-width: 100px;">Password</span>
                <input type="text" name="password" class="form-control  <?=!empty($errors['password'])?'border-danger':'';?>" placeholder="Type your password (empty if not changed)" aria-label="Password">
            </div>
            <div class="input-group mb-5">
                <span class="input-group-text" style="min-width: 100px;">Confirm</span>
                <input type="text" name="confirm" class="form-control  <?=!empty($errors['confirm'])?'border-danger':'';?>" placeholder="Confirm your password (empty if not changed)" aria-label="Password">
            </div>

            <div>
                <button class="btn btn-primary">Save</button>

                <?php if(Auth::get('role') == 'admin'): ?>
                    <a href="index.php?page_name=admin&tab=users">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </a>
                <?php else: ?>
                    <a href="index.php?page_name=profile&id=<?=Auth::get('id');?>">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </a>
                <?php endif; ?>

            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-danger">User not found in database.</div>
        <a href="index.php?page_name=home">
            <button type="button" class="btn btn-secondary">Back on main page</button>
        </a>
    <?php endif; ?>
</div>


<?php require views_path("includes/footer"); ?>



