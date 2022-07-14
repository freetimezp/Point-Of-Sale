<div>
    <table class="table table-striped table-hover">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Image</th>
            <th>Date</th>
            <th>
                <a href="index.php?page_name=signup">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add new</button>
                </a>
            </th>
        </tr>

        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <a href="index.php?page_name=profile&id=<?=$user['id'];?>">
                            <?=esc($user['username']);?>
                        </a>
                    </td>
                    <td><?=esc($user['email']);?></td>
                    <td><?=esc($user['role']);?></td>
                    <td>
                        <img class="user-image" src="<?=crop($user['image']);?>" alt="user">
                    </td>
                    <td><?=date("jS M, Y", strtotime($user['date']));?></td>
                    <td>
                        <a href="index.php?page_name=user-edit&id=<?=$user['id'];?>">
                            <button class="btn btn-sm btn-success">Edit</button>
                        </a>
                        <a href="index.php?page_name=user-delete&id=<?=$user['id'];?>">
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
</div>
