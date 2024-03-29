<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link <?=($section == 'table')?'active':'';?>" href="index.php?page_name=admin&tab=sales">Table view</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?=($section == 'graph')?'active':'';?>" href="index.php?page_name=admin&tab=sales&s=graph">Graph view</a>
    </li>
</ul>

<?php if($section == 'table'): ?>
    <div class="text-center">
        <form class="p-3">
            <div class="d-flex justify-content-center mb-3">
                <div class="me-2">
                    <label for="start">From:</label>
                    <input type="date" id="start" name="start" style="width: 150px;"
                           class="ms-2 p-1 text-primary border-primary rounded-3"
                           value="<?=!empty($_GET['start'])?$_GET['start']:'';?>"
                    >
                </div>
                <div class="me-2">
                    <label for="end">To:</label>
                    <input type="date" id="end" name="end" style="width: 150px;"
                           class="ms-2 p-1 text-primary border-primary rounded-3"
                           value="<?=!empty($_GET['end'])?$_GET['end']:'';?>"
                    >
                </div>
                <div>
                    <label for="limit">Rows:</label>
                    <input type="number" id="limit" name="limit" style="width: 50px;"
                           class="ms-2 p-1 text-primary border-primary rounded-3"
                           value="<?=!empty($_GET['limit'])?$_GET['limit']:20;?>"
                    >
                </div>
            </div>
            <div>
                <button class="btn btn-primary">CHOOSE</button>
                <input type="hidden" name="page_name" value="admin">
                <input type="hidden" name="tab" value="sales">
            </div>
        </form>
    </div>


    <div class="table-responsive">
        <h3>Total sales (you can choose period or one day): $<?=$sales_total;?></h3>
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
                        <?php
                            $cashier = get_user_by_id($sale['user_id']);
                            if(empty($cashier)) {
                                $name = "UNKNOWN";
                                $namelink = "#";
                            }else{
                                $name = $cashier['username'];
                                $namelink = "index.php?page_name=profile&id=" . $cashier['id'];
                            }
                        ?>
                        <td>
                            <a href="<?=$namelink;?>">
                                <?=esc($name);?>
                            </a>
                        </td>
                        <td>
                            <a href="index.php?page_name=sales-edit&id=<?=$sale['id'];?>">
                                <button class="btn btn-sm btn-success">Edit</button>
                            </a>
                            <a href="index.php?page_name=sales-delete&id=<?=$sale['id'];?>">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <hr>

        <?php $pager->display(); ?>
    </div>
<?php else: ?>
    <div>
        <h3>GRAPH view</h3>

        <?php
            $graph = new Graph();
            $data = [];
            $data = generate_daily_data($today_records);

            $graph->title = "Today's sales";
            $graph->xTitle = "Hours in 1 day";
            $graph->display($data);
        ?>

        <?php
        $data = [];
        $data = generate_month_data($month_records);

        $graph->title = "Month sales";
        $graph->xTitle = "Days in 1 month";
        $graph->display($data);
        ?>

        <?php
        $data = [];
        $data = generate_year_data($year_records);

        $graph->title = "Year sales";
        $graph->xTitle = "Month in 1 year";
        $graph->display($data);
        ?>
    </div>
<?php endif; ?>
