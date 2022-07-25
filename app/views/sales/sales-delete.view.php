<?php require views_path("includes/header"); ?>

<div class="col-6 mx-auto p-4 border shadow mt-4">
    <div class="mb-4 text-center">
        <h4>
            <span class="badge bg-primary text-white">
                <i class="fa fa-hamburger"></i>
            </span>
            <span class="text-primary">Delete sale</span>
        </h4>
    </div>

    <?php if($errors): ?>
        <?php foreach($errors as $error): ?>
            <div class="alert alert-danger"><?=$error;?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="alert alert-danger">
        <h4 class="text-center">Are you sure you want to delete this sale?</h4>
    </div>

    <?php if(!empty($row)): ?>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Sale product description:</label>
                <input type="text" name="description" disabled
                       value="<?=set_value('description', $row['description']);?>"
                       class="form-control <?=!empty($errors['description'])?'border-danger':'';?>"
                       placeholder="Sale description"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Sale product QTY:</label>
                <input type="text" name="barcode" disabled
                       value="<?=set_value('qty', $row['qty']);?>"
                       class="form-control <?=!empty($errors['qty'])?'border-danger':'';?>"
                       placeholder="Sale QTY"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Sale product AMOUNT:</label>
                <input type="text" name="barcode" disabled
                       value="<?=set_value('amount', $row['amount']);?>"
                       class="form-control <?=!empty($errors['amount'])?'border-danger':'';?>"
                       placeholder="Sale amount"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Sale product TOTAL:</label>
                <input type="text" name="barcode" disabled
                       value="<?=set_value('total', $row['total']);?>"
                       class="form-control <?=!empty($errors['total'])?'border-danger':'';?>"
                       placeholder="Sale total"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Sale date:</label>
                <input type="text" name="barcode" disabled
                       value="<?=set_value('date', $row['date']);?>"
                       class="form-control <?=!empty($errors['date'])?'border-danger':'';?>"
                       placeholder="Sale date"
                >
            </div>

            <div>
                <button class="btn btn-danger">Delete</button>
                <a href="index.php?page_name=admin&tab=sales">
                    <button type="button" class="btn btn-secondary">Cancel</button>
                </a>
            </div>
        </form>
    <?php else: ?>
        <div>
            <div class="alert alert-danger">No such sale found!</div>
            <a href="index.php?page_name=admin&tab=sales">
                <button type="button" class="btn btn-secondary">Back to sales</button>
            </a>
        </div>
    <?php endif; ?>
</div>


<?php require views_path("includes/footer"); ?>



