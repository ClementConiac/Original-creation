<?php

require_once '../tools/common.php';

if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == 0){
    header('location:../index.php');
    exit;
}

if(isset($_GET['category_item_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    $query = $db->prepare('DELETE FROM category_item WHERE id = ?');
    $result = $query->execute(
        [
            $_GET['category_item_id']
        ]
    );

    if($result){
        $message = "Suppression efféctuée.";
    }
    else{
        $message = "Impossible de supprimer la séléction.";
    }
}


$query = $db->query('SELECT * FROM category_item');
$category_item = $query->fetchall();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administration des catégories item</title>
    <?php require 'partials/head_assets.php'; ?>
</head>
<body class="index-body">
<?php require 'partials/header.php'; ?>
<div class="container-fluid">



    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des categories kind</h4>
                <a class="btn button-color" href="cat-item-form.php">Ajouter une categorie item</a>
            </header>

            <?php if(isset($message)): ?>
                <div class="bg-success text-white p-2 mb-4">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <?php if($category_item): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>


                <?php foreach($category_item as $category_items): ?>

                    <tr>
                        <!-- htmlentities sert à écrire les balises html sans les interpréter -->
                        <th><?php echo htmlentities($category_items['id']); ?></th>
                        <td><?php echo htmlentities($category_items['name']); ?></td>
                        <td><?php echo htmlentities($category_items['description']); ?></td>
                        <td>
                            <a href="cat-item-form.php?category_item_id=<?php echo $category_items['id']; ?>&action=edit" class="btn button-color">Modifier</a>
                            <a onclick="return confirm('Are you sure?')" href="cat-item-list.php?category_item_id=<?php echo $category_items['id']; ?>&action=delete" class="btn btn-danger button-logout">Supprimer</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <?php else: ?>
                    Aucun item enregistré.
                <?php endif; ?>

                </tbody>
            </table>

        </section>

    </div>

</div>
</body>
</html>