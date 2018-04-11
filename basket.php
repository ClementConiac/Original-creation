<?php
require_once('tools/common.php');
$query=$db->query('SELECT * FROM item ');
$item=$query->fetch();
?>
<?php
if(isset($_GET['add_basket'])){
    $query = $db->prepare('SELECT * FROM item WHERE id = ? ');
    $query->execute( array( $_GET['add_basket'] ) );
    $item = $query->fetch();

    if(isset($item)) {
        array_push ($_SESSION['basket'], [$item['id'], $item['title'] , $item['price'], $item['image']]);
    }
    if (isset($_GET['add_basket'])){
        header('location:basket.php');
        exit;
    }
}
$totalAllItem =0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Original'creatioN</title>
    <?php require_once 'partials/head_assets.php' ?>

</head>
<body class="body">

<?php require_once 'partials/header.php'?>


<div class="container-fluid">
    <div class="row">
        <div class="container">
            <?php if(isset($_SESSION['basket'])) :
                $totalAllItem = 0;
                foreach ($_SESSION['basket'] as $key => $items) : ?>


                    <div class="row align-items-center justify-content-between">

                                <div class="main-basket d-flex flex-column justify-content-center col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                                    <a title="add_basket" href="item-page.php?item_id=<?php echo $items[0] ?>"  aria-pressed="true" name="add_basket" >
                                        <img class="img-fluid image-item" src="image/image-all/<?php echo $items[3]; ?>" alt=""/>
                                    </a>
                                    <p class="text-center"><?php echo $items[1]; ?></p>
                                    <p class="text-center"><?php echo $items[2]; ?> €</p>
                                    <a onclick="return confirm ('Voulez-vous vraiment supprimer ce produit ?')" href="basket.php?id=<?php echo $items[0]; ?>&action=delete" class="btn btn-danger mb-5">
                                        Supprimer du panier
                                    </a>
                                </div>
                        </div>



                    <?php $price=$items[2];
                    $totalAllItem += $price ;?>



                <?php endforeach;
                /*supprimer un element d'un tableau et dÃ©caler le tableau */?>
                <?php if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] = 'delete') {
                array_shift($_SESSION['basket']);
            }
            if (isset($_GET['action']) && $_GET['action'] = 'delete'){
                header('location:basket.php');
                exit;
            }
            ?>


                <div class="row justify-content-start">
                    <h5 class="mr-4"> Total de tous les produits : <?php echo $totalAllItem ?> €</h5>
                </div>
            <?php endif; ?>
        </div>

    </div>


    <?php require_once 'partials/footer.php'?>

</div>

</body>
</html>


