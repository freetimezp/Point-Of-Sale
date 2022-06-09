<?php require views_path("includes/header"); ?>

<div class="text-center p-2 shadow">
    <h2><?=APP_NAME;?></h2>
</div>

<div>
    <div class="row">
        <div class="col-9 p-3 main-body" style="min-height: 600px; overflow-y: scroll;">
            <div class="d-flex justify-content-between p-1">
                <div class="text-center" style="width: 100%;">
                    <h4>Items</h4>
                </div>

                <div class="d-flex flex-row">
                    <input class="border-warning" type="text" name="search" placeholder="Search" style="max-width: 200px; outline: none;">
                    <span class="input-group-text bg-danger text-white shadow"><i class="fa fa-search"></i></span>
                </div>
            </div>

            <div class="js-products p-4 d-flex justify-content-center">
                <div class="card rounded-2">
                    <img src="assets/images/item-001.jpg" class="w-100" alt="food">
                    <div class="p-4 text-center">
                        <div class="text-muted mb-1 title">Food</div>
                        <div class="price"><b>$5.00</b></div>
                    </div>
                </div>

                <div class="card rounded-2">
                    <img src="assets/images/item-001.jpg" class="w-100" alt="food">
                    <div class="p-4 text-center">
                        <div class="text-muted mb-1 title">Food</div>
                        <div class="price"><b>$5.00</b></div>
                    </div>
                </div>

                <div class="card rounded-2">
                    <img src="assets/images/item-001.jpg" class="w-100" alt="food">
                    <div class="p-4 text-center">
                        <div class="text-muted mb-1 title">Food</div>
                        <div class="price"><b>$5.00</b></div>
                    </div>
                </div>

                <div class="card rounded-2">
                    <img src="assets/images/item-001.jpg" class="w-100" alt="food">
                    <div class="p-4 text-center">
                        <div class="text-muted mb-1 title">Food</div>
                        <div class="price"><b>$5.00</b></div>
                    </div>
                </div>

                <div class="card rounded-2">
                    <img src="assets/images/item-001.jpg" class="w-100" alt="food">
                    <div class="p-4 text-center">
                        <div class="text-muted mb-1 title">Food</div>
                        <div class="price"><b>$5.00</b></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 p-3">
            <h4 class="text-center">Cart <span class="badge bg-primary rounded-circle">3</span></h4>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Image</th><th>Description</th><th>Amount</th>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php require views_path("includes/footer"); ?>


