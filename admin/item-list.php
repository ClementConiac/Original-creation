<?php

require_once '../tools/common.php';

if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == 0){
    header('location:../index.php');
    exit;
}


if(isset($_GET['item_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    $query = $db->prepare('DELETE FROM item WHERE id = ?');
    $result = $query->execute(
        [
            $_GET['item_id']
        ]
    );

    if($result){
        $message = "Suppression efféctuée.";
    }
    else{
        $message = "Impossible de supprimer la séléction.";
    }
}


$query = $db->query('SELECT * FROM item');
$item = $query->fetchall();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administration des items </title>
    <?php require 'partials/head_assets.php'; ?>
</head>
<body class="index-body">
<?php require 'partials/header.php'; ?>
<div class="container-fluid">



    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des items</h4>
                <a class="btn button-color" href="item-form.php">Ajouter un item</a>
            </header>

            <?php if(isset($message)): ?>
                <div class="bg-success text-white p-2 mb-4">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <?php if($item): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Publié</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>


                    <?php foreach($item as $items): ?>

                        <tr>
                            <!-- htmlentities sert à écrire les balises html sans les interpréter -->
                            <th><?php echo htmlentities($items['id']); ?></th>
                            <td><?php echo htmlentities($items['title']); ?></td>
                            <td>
                                <?php if($items['is_published'] == 1): ?>
                                    Oui
                                <?php else: ?>
                                    Non
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="item-form.php?item_id=<?php echo $items['id']; ?>&action=edit" class="btn button-color">Modifier</a>
                                <a onclick="return confirm('Are you sure?')" href="item-list.php?item_id=<?php echo $items['id']; ?>&action=delete" class="btn btn-danger button-logout">Supprimer</a>
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
