<?php require views_path("includes/header"); ?>

<h2 class="title text-center bg-primary p-3 text-white m-2 shadow-lg rounded-2">
    <i class="fa fa-user-shield"></i>
    <span>Admin panel</span>
</h2>

<div class="container-fluid row mt-3">
    <div class="col-12 col-sm-4 col-md-2">
        <ul class="list-group">
            <a href="index.php?page_name=admin&tab=dashboard">
                <li class="list-group-item <?=$tab=='dashboard'?'active':'';?>">
                    <i class="fa fa-th-large" style="min-width: 20px;"></i>
                    <span> Dashboard</span>
                </li>
            </a>
            <a href="index.php?page_name=admin&tab=users">
                <li class="list-group-item <?=$tab=='users'?'active':'';?>">
                    <i class="fa fa-users" style="min-width: 20px;"></i>
                    <span> Users</span>
                </li>
            </a>
            <a href="index.php?page_name=admin&tab=products">
                <li class="list-group-item  <?=$tab=='products'?'active':'';?>">
                    <i class="fa fa-hamburger" style="min-width: 20px;"></i>
                    <span> Products</span>
                </li>
            </a>
            <a href="index.php?page_name=admin&tab=sales">
                <li class="list-group-item  <?=$tab=='sales'?'active':'';?>">
                    <i class="fa fa-money-bill-wave" style="min-width: 20px;"></i>
                    <span> Sales</span>
                </li>
            </a>
            <a href="index.php?page_name=logout">
                <li class="list-group-item">
                    <i class="fa fa-sign-out" style="min-width: 20px;"></i>
                    <span> Logout</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="border col-10">
        <h2><?=strtoupper($tab);?></h2>

        <div>
            <?php
                switch($tab) {
                    case 'products':
                        require views_path("admin/products");
                        break;

                    case 'users':
                        require views_path("admin/users");
                        break;

                    case 'sales':
                        require views_path("admin/sales");
                        break;

                    default:
                            break;
                }
            ?>
        </div>
    </div>
</div>

<?php require views_path("includes/footer"); ?>
