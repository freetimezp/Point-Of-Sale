<?php require views_path("includes/header"); ?>

<div class="col-6 mx-auto p-4 border shadow mt-4">
    <div class="mb-4 text-center">
        <h4>
            <span class="badge bg-primary text-white">
                <i class="fa fa-hamburger"></i>
            </span>
            <span class="text-primary">Delete product</span>
        </h4>
    </div>

    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <div class="alert alert-danger"><?=$error;?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="alert alert-danger">
        <h4 class="text-center">Are you sure you want to delete this product?</h4>
    </div>

    <?php if(!empty($row)): ?>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Product description:</label>
                <input type="text" name="description" disabled
                       value="<?=set_value('description', $row['description']);?>"
                       class="form-control <?=!empty($errors['description'])?'border-danger':'';?>"
                       placeholder="Product description"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Product barcode <span class="text-muted">(optional)</span>:</label>
                <input type="text" name="barcode" disabled
                       value="<?=set_value('barcode', $row['barcode']);?>"
                       class="form-control <?=!empty($errors['barcode'])?'border-danger':'';?>"
                       placeholder="Product barcode"
                >
            </div>

            <div class="mb-5">
                <label class="form-label">Product image:</label>
                <img class="w-100" src="<?=$row['image'];?>" alt="product-single">
            </div>

            <div>
                <button class="btn btn-danger">Delete</button>
                <a href="index.php?page_name=admin&tab=products">
                    <button type="button" class="btn btn-secondary">Cancel</button>
                </a>
            </div>
        </form>
    <?php else: ?>
        <div>
            <div class="alert alert-danger">No such product found!</div>
            <a href="index.php?page_name=admin&tab=products">
                <button type="button" class="btn btn-secondary">Back to products</button>
            </a>
        </div>
    <?php endif; ?>
</div>


<?php require views_path("includes/footer"); ?>



