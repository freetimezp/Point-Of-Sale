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
    $no_nav = [];
    $no_nav[] = 'login';
    //$no_nav[] = 'signup';
?>

<?php if(!in_array($controller, $no_nav)): ?>
    <?php require views_path("includes/navbar"); ?>
<?php endif; ?>

<div class="container-fluid">

