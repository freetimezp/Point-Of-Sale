<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Table view</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Graph view</a>
    </li>
</ul>

<div class="table-responsive">
    <h3>Today total sales: $<?=$sales_total;?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Barcode</th>
            <th>Receipt_no</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Date</th>
            <th>Cashier</th>
            <th>
                <a href="index.php?page_name=home">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add new</button>
                </a>
            </th>
        </tr>

        <?php if (!empty($sales)): ?>
            <?php foreach ($sales as $sale): ?>
                <tr>
                    <td><?=esc($sale['barcode']);?></td>
                    <td><?=esc($sale['receipt_no']);?></td>
                    <td><?=esc($sale['description']);?></td>
                    <td><?=esc($sale['qty']);?></td>
                    <td><?=esc($sale['amount']);?></td>
                    <td><?=esc($sale['total']);?></td>
                    <td><?=date("jS M, Y", strtotime($sale['date']));?></td>
                    <td><?=esc($sale['user_id']);?></td>
                    <td>
                        <a href="index.php?page_name=product-edit&id=<?=$sale['id'];?>">
                            <button class="btn btn-sm btn-success">Edit</button>
                        </a>
                        <a href="index.php?page_name=product-delete&id=<?=$sale['id'];?>">
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
</div>
