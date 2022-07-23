<?php require views_path("includes/header"); ?>

<div class="container text-center border col-lg-4 col-md-8 mt-4 p-4">
    <h3><i class="fa fa-user pe-2"></i>Profile User: <span class="badge bg-primary"><?=is_array($row)?$row['username']:'';?></span></h3>
    <h5 class="mb-5"><?=APP_NAME;?></h5>

    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <div class="alert alert-danger"><?=$error;?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(is_array($row)): ?>
        <table class="table table-hover table-striped">
            <tr>
                <td><img class="user-image" src="<?=crop($row['image'], 600, $row['gender']);?>" alt="user"></td>
            </tr>
            <tr>
                <th>Username</th><td><?=set_value('username', $row['username']);?></td>
            </tr>
            <tr>
                <th>Email</th><td><?=set_value('email', $row['email']);?></td>
            </tr>
            <tr>
                <th>Gender</th><td><?=set_value('gender', $row['gender']);?></td>
            </tr>
            <tr>
                <th>Role</th><td><?=set_value('role', $row['role']);?></td>
            </tr>
            <tr>
                <th>Date</th><td><?=get_date($row['date']);?></td>

            </tr>
        </table>

        <a href="index.php?page_name=edit-user&id=<?=$row['id'];?>">
            <button type="button" class="btn btn-warning">Edit info</button>
        </a>
    <?php else: ?>
        <div class="alert alert-danger">User not found in database.</div>
    <?php endif; ?>
</div>


<?php require views_path("includes/footer"); ?>




