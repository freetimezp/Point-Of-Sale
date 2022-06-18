<?php require views_path("includes/header"); ?>

<div class="col-6 mx-auto p-4 border shadow mt-4">
    <div class="mb-4 text-center">
        <h4>
            <span class="badge bg-primary text-white">
                <i class="fa fa-hamburger"></i>
            </span>
            <span class="text-primary">Edit product</span>
        </h4>
    </div>

    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <div class="alert alert-danger"><?=$error;?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(!empty($row)): ?>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Product description:</label>
                <input type="text" name="description"
                       value="<?=set_value('description', $row['description']);?>"
                       class="form-control <?=!empty($errors['description'])?'border-danger':'';?>"
                       placeholder="Product description"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Product barcode <span class="text-muted">(optional)</span>:</label>
                <input type="text" name="barcode"
                       value="<?=set_value('barcode', $row['barcode']);?>"
                       class="form-control <?=!empty($errors['barcode'])?'border-danger':'';?>"
                       placeholder="Product barcode"
                >
            </div>

            <div class="mb-3 input-group">
                <span class="input-group-text">Qty:</span>
                <input type="number" name="qty" value="<?=set_value('qty', $row['qty']);?>"
                       class="form-control me-2 <?=!empty($errors['qty'])?'border-danger':'';?>" placeholder="Type qty"
                >

                <span class="input-group-text">Amount:</span>
                <input type="number" name="amount" step="0.01" value="<?=set_value('amount', $row['amount']);?>"
                       class="form-control <?=!empty($errors['amount'])?'border-danger':'';?>" placeholder="Type amount"
                >
            </div>

            <div class="mb-5">
                <label class="form-label">Product image:</label>
                <input type="file" name="image" class="form-control" placeholder="Product image">
                <img class="w-100" src="<?=$row['image'];?>" alt="product-single">
            </div>

            <div>
                <button class="btn btn-success">Save</button>
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


