<?php

require_once '../tools/common.php';

if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == 0){
    header('location:../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Administration - Original'creatioN !</title>
    <?php require 'partials/head_assets.php'; ?>
</head>
<?php require 'partials/header.php'; ?>
<body class="index-body">
        <?php require 'partials/nav.php'; ?>
</body>
</html>