<?php require views_path("includes/header"); ?>

<h1 class="text-center">Access denied!</h1>
<div class="text-center text-danger">
    <h2><?=Auth::getMessage();?></h2>
</div>

<?php require views_path("includes/footer"); ?>
