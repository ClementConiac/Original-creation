<?php

require_once '../tools/common.php';

if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == 0){
    header('location:../index.php');
    exit;
}


if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){

    $query = $db->prepare('DELETE FROM user WHERE id = ?');
    $result = $query->execute(
        [
            $_GET['user_id']
        ]
    );

    if($result){
        $message = "Suppression efféctuée.";
    }
    else{
        $message = "Impossible de supprimer la séléction.";
    }
}


$query = $db->query('SELECT * FROM user');
$users = $query->fetchall();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administration des utilisateurs</title>
    <?php require 'partials/head_assets.php'; ?>
</head>
<body class="index-body">
<?php require 'partials/header.php'; ?>
<div class="container-fluid">



    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des utilisateurs</h4>
                <a class="btn button-color" href="user-form.php">Ajouter un utilisateur</a>
            </header>

            <?php if(isset($message)): ?>
                <div class="bg-success text-white p-2 mb-4">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if($users): ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $user): ?>

                        <tr>
                            <!-- htmlentities sert à écrire les balises html sans les interpréter -->
                            <th><?php echo htmlentities($user['id']); ?></th>
                            <td><?php echo htmlentities($user['firstname']); ?></td>
                            <td><?php echo htmlentities($user['lastname']); ?></td>
                            <td><?php echo htmlentities($user['email']); ?></td>
                            <td><?php echo htmlentities($user['is_admin']); ?></td>
                            <td>
                                <a href="user-form.php?user_id=<?php echo $user['id']; ?>&action=edit" class="btn button-color">Modifier</a>
                                <a onclick="return confirm('Are you sure?')" href="user-list.php?user_id=<?php echo $user['id']; ?>&action=delete" class="btn btn-danger button-logout">Supprimer</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>
            <?php else: ?>
                Aucun utilisateur enregistré.
            <?php endif; ?>

        </section>

    </div>

</div>
</body>
</html>