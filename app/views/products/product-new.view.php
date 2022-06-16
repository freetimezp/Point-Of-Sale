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
    
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Product description:</label>
            <input type="text" name="description" class="form-control" placeholder="Product description">
        </div>

        <div class="mb-3">
            <label class="form-label">Product barcode <span class="text-muted">(optional)</span>:</label>
            <input type="text" name="barcode" class="form-control" placeholder="Product barcode">
        </div>

        <div class="mb-3 input-group">
            <span class="input-group-text">Qty:</span>
            <input type="number" name="qty" value="1" class="form-control me-2" placeholder="Type qty">

            <span class="input-group-text">Amount:</span>
            <input type="number" name="amount" step="0.05" value="0.00" class="form-control" placeholder="Type amount">
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

