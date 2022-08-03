<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Point of sale</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php
$vars = $_GET['vars'] ?? '';
$obj = json_decode($vars, true);
?>

<div class="container p-5 text-center" style="width: 80%;">
    <?php if(is_array($obj)): ?>
        <center>
            <h1><?=$obj['company'];?></h1>
            <h3>RECEIPT</h3>
            <span class="fs-5 fst-italic"><?=date("jS F, Y H:i:s");?></span>
        </center>

        <br>

        <table class="table table-striped table-hover mb-3">
            <tr>
                <th>Qty</th>
                <th>Description</th>
                <th>Amount x 1</th>
                <th>Amount x Qty</th>
            </tr>

            <?php foreach($obj['data'] as $row): ?>
                <tr>
                    <td><?='x ' . $row['qty'];?></td>
                    <td><?=$row['description'];?></td>
                    <td><?=$row['amount'] . '$';?></td>
                    <td><?=number_format($row['qty'] * $row['amount'], 2) . '$';?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2"></td><td class="fw-bold">Total: </td><td class="fw-bold fs-4"><?=$obj['gtotal'] . '$';?></td>
            </tr>
            <tr>
                <td colspan="2"></td><td>Amount paid: </td><td><?=$obj['amount'] . '$';?></td>
            </tr>
            <tr>
                <td colspan="2"></td><td>Change: </td><td><?=$obj['change'] . '$';?></td>
            </tr>
        </table>

        <h5 class="text-center p-3 fst-italic">Thanks for shopping with us!</h5>
    <?php endif; ?>

</div>

</body>
<script src="assets/js/bootstrap.min.js"></script>
</html>