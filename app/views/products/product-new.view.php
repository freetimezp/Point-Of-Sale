<?php require views_path("includes/header"); ?>

<div class="col-6 mx-auto p-4 border shadow mt-4">
    <div class="mb-4 text-center">
        <h4>
            <span class="badge bg-primary text-white">
                <i class="fa fa-hamburger"></i>
            </span>
            <span class="text-primary">Add product</span>
        </h4>
    </div>

    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <div class="alert alert-danger"><?=$error;?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Product description:</label>
            <input type="text" name="description"
                   value="<?=set_value('description');?>"
                   class="form-control <?=!empty($errors['description'])?'border-danger':'';?>"
                   placeholder="Product description"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Product barcode <span class="text-muted">(optional)</span>:</label>
            <input type="text" name="barcode"
                   value="<?=set_value('barcode');?>"
                   class="form-control <?=!empty($errors['barcode'])?'border-danger':'';?>"
                   placeholder="Product barcode"
            >
        </div>

        <div class="mb-3 input-group">
            <span class="input-group-text">Qty:</span>
            <input type="number" name="qty" value="<?=set_value('qty', 1);?>"
                   class="form-control me-2 <?=!empty($errors['qty'])?'border-danger':'';?>" placeholder="Type qty"
            >

            <span class="input-group-text">Amount:</span>
            <input type="number" name="amount" step="0.05" value="<?=set_value('amount', 0.00);?>"
                   class="form-control <?=!empty($errors['amount'])?'border-danger':'';?>" placeholder="Type amount"
            >
        </div>

        <div class="mb-5">
            <label class="form-label">Product image:</label>
            <input type="file" name="image" class="form-control" placeholder="Product image">
        </div>

        <div>
            <button class="btn btn-success">Save</button>
            <a href="index.php?page_name=admin&tab=products">
                <button type="button" class="btn btn-secondary">Cancel</button>
            </a>
        </div>
    </form>
</div>


<?php require views_path("includes/footer"); ?>

