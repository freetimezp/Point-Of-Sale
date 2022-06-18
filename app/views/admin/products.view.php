<div>
    <table class="table table-striped table-hover">
        <tr>
            <th>Barcode</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Image</th>
            <th>Date</th>
            <th>
                <a href="index.php?page_name=product-new">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add new</button>
                </a>
            </th>
        </tr>

        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?=esc($product['barcode']);?></td>
                    <td>
                        <a href="index.php?page_name=product-single&id=<?=$product['id'];?>">
                            <?=esc($product['description']);?>
                        </a>
                    </td>
                    <td><?=esc($product['qty']);?></td>
                    <td><?=esc($product['amount']);?></td>
                    <td>
                        <img class="product-image" src="<?=$product['image'];?>" alt="product">
                    </td>
                    <td><?=esc($product['date']);?></td>
                    <td>
                        <button class="btn btn-sm btn-success">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
</div>