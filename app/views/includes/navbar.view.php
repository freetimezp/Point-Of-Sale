<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid navbar-block">
        <a class="navbar-brand" href="#"><?=APP_NAME;?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page_name=home">Home</a>
                </li>

                <?php if(Auth::access('supervisor')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page_name=admin">Admin</a>
                    </li>
                <?php endif; ?>

                <?php if(Auth::access('admin')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page_name=signup">Create user</a>
                    </li>
                <?php endif; ?>

                <?php if(!Auth::logged_in()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page_name=login">Login</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span><?=auth('username');?></span><span>(<?=Auth::get('role');?>)</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?page_name=profile&id=<?=Auth::get('id');?>">Profile</a></li>
                            <li><a class="dropdown-item" href="index.php?page_name=edit-user&id=<?=Auth::get('id');?>">Profile settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php?page_name=logout">Logout</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
