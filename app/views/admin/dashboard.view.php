<div>
    <div class="row justify-content-center">
        <div class="col-md-3 border rounded p-4 m-2 shadow text-center">
            <i class="fa fa-users p-2" style="font-size: 40px;"></i>
            <h5>Total users</h5>
            <span>
                <?=$users?count($users):0;?>
            </span>
        </div>
        <div class="col-md-3 border rounded p-4 m-2 shadow text-center">
            <i class="fa fa-hamburger p-2" style="font-size: 40px;"></i>
            <h5>Total products</h5>
            <span>
                <?=$products?count($products):0;?>
            </span>
        </div>
        <div class="col-md-3 border rounded p-4 m-2 shadow text-center">
            <i class="fa fa-money-bill-wave p-2" style="font-size: 40px;"></i>
            <h5>Total sales</h5>
            <span>
                <?=$total?$total.'$':0;?>
            </span>
        </div>
    </div>
</div>


