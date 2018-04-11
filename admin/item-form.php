<?php

require_once '../tools/common.php';

if(!isset($_SESSION['is_admin']) OR $_SESSION['is_admin'] == 0){
    header('location:../index.php');
    exit;
}

//Si $_POST['save'] existe, cela signifie que c'est un ajout d'article
if(isset($_POST['save'])){

    $query = $db->prepare('INSERT INTO item (title, price, is_published, created_at) VALUES (?, ?, ?, NOW())');
    $newArticle = $query->execute(
        [
            $_POST['title'],
            $_POST['price'],
            $_POST['is_published']
        ]
    );

    //on récupère l'id du dernier enregistrement en base de données (ici l'article inséré ci-dessus)
    $lastInsertedArticleId = $db->lastInsertId();

    foreach($_POST['categories_item'] as $category_item_id){
        $query = $db->prepare('INSERT INTO item_category (item_id, category_item_id, category_kind_id) VALUES (?, ?, ?)');
        $newArticle = $query->execute([
            $lastInsertedArticleId,
            $category_item_id,
            $_POST['categories_kind'],
        ]);
    }



    //redirection après enregistrement
    //si $newArticle alors l'enregistrement a fonctionné
    if($newArticle){

        //upload de l'image si image envoyée via le formulaire
        if(!empty($_FILES['image']['name'])){

            //tableau des extentions que l'on accepte d'uploader
            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            //extension dufichier envoyé via le formulaire
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

            //si l'extension du fichier envoyé est présente dans le tableau des extensions acceptées
            if ( in_array($my_file_extension , $allowed_extensions) ){

                //je génrère une chaîne de caractères aléatoires qui servira de nom de fichier
                //le but étant de ne pas écraser un éventuel fichier ayant le même nom déjà sur le serveur
                $new_file_name = md5(rand());

                //destination du fichier sur le serveur (chemin + nom complet avec extension)
                $destination = '../image/image-all/' . $new_file_name . '.' . $my_file_extension;

                //déplacement du fichier à partir du dossier temporaire du serveur vers sa destination
                $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

                //mise à jour de l'article enregistré ci-dessus avec le nom du fichier image qui lui sera associé
                $query = $db->prepare('UPDATE item SET
					image = :image
					WHERE id = :id'
                );

                $resultUpdateImage = $query->execute(
                    [
                        'image' => $new_file_name . '.' . $my_file_extension,
                        'id' => $lastInsertedArticleId
                    ]
                );
            }
        }

        //redirection après enregistrement
        header('location:item-list.php');
        exit;
    }
    else{ //si pas $newArticle => enregistrement échoué => générer un message pour l'administrateur à afficher plus bas
        $message = "Impossible d'enregistrer le nouvel article...";
    }
}


//Si $_POST['update'] existe, cela signifie que c'est une mise à jour d'article
if(isset($_POST['update'])){

    $query = $db->prepare('UPDATE item SET
		title = :title,
		price = :price,
		is_published = :is_published
		WHERE id = :id'
    );

    //mise à jour avec les données du formulaire
    $resultArticle = $query->execute([
        'title' => $_POST['title'],
        'price' => $_POST['price'],
        'is_published' => $_POST['is_published'],
        'id' => $_POST['id'],
    ]);
    $query = $db->prepare('DELETE FROM item_category WHERE item_id = ?');
    $result = $query->execute([
        $_POST['id']
    ]);


    foreach($_POST['categories_item'] as $category_item_id){
        $query = $db->prepare('INSERT INTO item_category (item_id, category_item_id, category_kind_id) VALUES (?, ?, ?)');
        $newArticle = $query->execute([
            $_POST['id'],
            $category_item_id,
            $_POST['categories_kind'],
        ]);
    }
    //si enregistrement ok
    if($resultArticle){
        if(!empty($_FILES['image']['name'])){

            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

            if ( in_array($my_file_extension , $allowed_extensions) ){

                //si un fichier est soumis lors de la mise à jour, je commence par supprimer l'ancien du serveur s'il existe
                if(isset($_POST['current-image'])){
                    unlink('../image/image-all/' . $_POST['current-image']);
                }

                $new_file_name = md5(rand());
                $destination = '../image/image-all/' . $new_file_name . '.' . $my_file_extension;
                $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

                $query = $db->prepare('UPDATE item SET
					image = :image
					WHERE id = :id'
                );
                $resultUpdateImage = $query->execute([
                    'image' => $new_file_name . '.' . $my_file_extension,
                    'id' => $_POST['id']
                ]);
            }
        }

        header('location:item-list.php');
        exit;
    }
    else{
        $message = 'Impossible de modifier le nouvel article...';
    }
}

//si on modifie un article, on doit séléctionner l'article en question (id envoyé dans URL) pour pré-remplir le formulaire plus bas
if(isset($_GET['item_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){

    $query = $db->prepare('SELECT * FROM item WHERE id = ?');
    $query->execute(array($_GET['item_id']));
    //$article contiendra les informations de l'article dont l'id a été envoyé en paramètre d'URL
    $item = $query->fetch();

    $query = $db->prepare('SELECT category_item_id , category_kind_id FROM item_category WHERE item_id = ?');
    $query->execute(array($_GET['item_id']));

    $itemCategories = $query->fetchAll();

    //ici aller chercher les images liées à l'articles pour les lister dans l'onglet des images

}

//si une image a été soumise
if(isset($_POST['add_image'])){

    $query = $db->prepare('INSERT INTO image (caption, item_id, model, back) VALUES (?, ?, ?, ?)');
    $newImage = $query->execute([
        $_POST['caption'],
        $_POST['item_id'],
        $_POST['model'],
        $_POST['back']
    ]);

    //on récupère l'ID de l'image que l'on vient d'enregistrer en BDD
    $lastInsertedImageId = $db->lastInsertId();

    //si enregistrement ok
    if($newImage){
        if(isset($_FILES['image'])){

            $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);

            if ( in_array($my_file_extension , $allowed_extensions) ){

                $new_file_name = md5(rand());
                $destination = '../image/image-all/' . $new_file_name . '.' . $my_file_extension;
                $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

                //mise à jour de l'image enregistrée avec le nom de fichier généré
                $query = $db->prepare('UPDATE image SET
					name = :name
					WHERE id = :id'
                );
                $resultUpdateImage = $query->execute([
                    'name' => $new_file_name . '.' . $my_file_extension,
                    'id' => $lastInsertedImageId
                ]);
            }
        }
        $imgMessage = "Image ajoutée avec succès !";
    }
}
//suppression d'une image
if(isset($_POST['delete_image'])){
    $query = $db->prepare('SELECT name FROM image WHERE id = ?');
    $query->execute([$_POST['img_id']]);
    $ImgToUnlink = $query ->fetch();

    unlink('../image/image-all/' . $ImgToUnlink['name']);

    $queryDelete = $db->prepare('DELETE FROM image WHERE id=?');
    $queryDelete->execute([$_POST['img_id']]);

    $imgMessage = "Image Supprimée avec succès !";
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Administration des articles - Mon premier blog !</title>

    <?php require 'partials/head_assets.php'; ?>

</head>
<body class="index-body">
<div class="container-fluid">

    <?php require 'partials/header.php'; ?>

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-3">
                <!-- Si $article existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
                <h4><?php if(isset($item)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un article</h4>
            </header>

            <ul class="nav nav-tabs justify-content-center nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?php if(isset($_POST['save']) || isset($_POST['update']) || !isset($_POST['add_image'])): ?>active<?php endif; ?>" data-toggle="tab" href="#infos" role="tab">Infos</a>
                </li>
                <?php if(isset($item)): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if(isset($_POST['add_image'])): ?>active<?php endif; ?>" data-toggle="tab" href="#images" role="tab">Images</a>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="tab-content">
                <div class="tab-pane container-fluid <?php if(isset($_POST['save']) || isset($_POST['update']) || !isset($_POST['add_image'])): ?>active<?php endif; ?>" id="infos" role="tabpanel">

                    <?php if(isset($message)): //si un message a été généré plus haut, l'afficher ?>
                        <div class="bg-danger text-danger">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Si $article existe, chaque champ du formulaire sera pré-remplit avec les informations de l'article -->
                    <form action="item-form.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input class="form-control" <?php if(isset($item)): ?>value="<?php echo htmlentities($item['title']); ?>"<?php endif; ?> type="text" placeholder="Titre" name="title" id="title" />
                        </div>
                        <div class="form-group">
                            <label for="price">Price :</label>
                            <input class="form-control" <?php if(isset($item)): ?>value="<?php echo htmlentities($item['price']); ?>"<?php endif; ?> type="number" placeholder="Prix" name="price" id="price" />
                        </div>

                        <div class="form-group">
                            <label for="image">Image :</label>
                            <input class="form-control" type="file" name="image" id="image" />
                            <?php if(isset($item) && $item['image']): ?>
                                <img class="img-fluid py-4" src="../image/image-all/<?php echo $item['image']; ?>" alt="" />
                                <input type="hidden" name="current-image" value="<?php echo $item['image']; ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="categories_item"> Catégorie item :</label>
                            <select class="form-control" name="categories_item[]" id="categories_item" multiple="multiple">
                                <?php
                                $queryCategoryItem= $db ->query('SELECT * FROM category_item');
                                $categoriesItem = $queryCategoryItem->fetchAll();
                                ?>
                                <?php foreach($categoriesItem as $key => $category_item) : ?>

                                    <?php
                                    $selected = '';

                                    foreach ($itemCategories as $itemCategorie) {
                                        if($category_item['id'] == $itemCategorie['category_item_id']){
                                            $selected = 'selected="selected"';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $category_item['id']; ?>" <?php echo $selected; ?>> <?php echo $category_item['name']; ?> </option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="categories_kind"> Catégorie kind : </label>
                            <select class="form-control" name="categories_kind" id="categories_kind">
                                <?php
                                $queryCategoryKind= $db ->query('SELECT * FROM category_kind');
                                while($categoryKind = $queryCategoryKind->fetch()):
                                    ?>
                                    <option value="<?php echo $categoryKind['id']; ?>" <?php if(isset($item) && $itemCategorie['category_kind_id'] == $categoryKind['id']): ?>selected<?php endif; ?>> <?php echo $categoryKind['name']; ?> </option>
                                <?php endwhile; ?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="is_published"> Publié ?</label>
                            <select class="form-control" name="is_published" id="is_published">
                                <option value="0" <?php if(isset($item) && $item['is_published'] == 0): ?>selected<?php endif; ?>>Non</option>
                                <option value="1" <?php if(isset($item) && $item['is_published'] == 1): ?>selected<?php endif; ?>>Oui</option>
                            </select>
                        </div>


                        <div class="text-right">

                            <!-- Si $article existe, on affiche un lien de mise à jour -->
                            <?php if(isset($item)): ?>
                                <input class="btn button-color" type="submit" name="update" value="Mettre à jour" />
                                <!-- Sinon on afficher un lien d'enregistrement d'un nouvel article -->
                            <?php else: ?>
                                <input class="btn button-color" type="submit" name="save" value="Enregistrer" />
                            <?php endif; ?>
                        </div>

                        <!-- Si $article existe, on ajoute un champ caché contenant l'id de l'article à modifier pour la requête UPDATE -->
                        <?php if(isset($item)): ?>
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
                        <?php endif; ?>

                    </form>
                </div>
                <?php if(isset($item)): ?>
                    <div class="tab-pane container-fluid <?php if(isset($_POST['add_image'])): ?>active<?php endif; ?>" id="images" role="tabpanel">

                        <h5 class="mt-4"><?php if(isset($image)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> une image :</h5>

                        <form action="item-form.php?item_id=<?php echo $item['id']; ?>&action=edit" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="caption">Légende :</label>
                                <input class="form-control" type="text" placeholder="Légende" name="caption" id="caption" />
                            </div>
                            <div class="form-group">
                                <label for="image">Fichier :</label>
                                <input class="form-control" type="file" name="image" id="image" />
                            </div>
                            <div class="form-group">
                                <label for="model"> Photo mannequin ?</label>
                                <select class="form-control" name="model" id="model">
                                    <option value="1" <?php if(isset($item)): ?>selected<?php endif; ?>>Oui</option>
                                    <option value="0" <?php if(isset($item)): ?>selected<?php endif; ?>>Non</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="back"> Photo de dos ?</label>
                                <select class="form-control" name="back" id="back">
                                    <option value="1" <?php if(isset($item)): ?>selected<?php endif; ?>>Oui</option>
                                    <option value="0" <?php if(isset($item)): ?>selected<?php endif; ?>>Non</option>
                                </select>
                            </div>
                            <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>" />

                            <div class="text-right">
                                <input class="btn btn-success button-color" type="submit" name="add_image" value="Enregistrer" />
                            </div>
                        </form>
                        <div class="row">
                            <h5 class="col-12 pb-4">Liste des images :</h5>

                            <?php
                            $queryListImages = $db->prepare('SELECT * FROM image WHERE item_id = ?');
                            $queryListImages->execute(array($_GET['item_id']));

                            foreach($queryListImages as $imageArticle) : ?>
                                <form action="item-form.php?article_id=<?php echo $item['id']; ?>&action=edit" method="post" class="col-4 my-3">
                                    <img src="../image/image-all/<?php echo $imageArticle['name']; ?>" alt="" class="img-fluid"/>
                                    <p class="my-2"><?php echo $imageArticle['caption']; ?></p>
                                    <input type="hidden" name="img_id" value="<?php echo $imageArticle['id']; ?>" />
                                    <div class="text-right"><input class="btn btn-danger" type="submit" name="delete_image" value="Supprimer"/></div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>
<?php require '../partials/footer_js.php'; ?>
</body>
</html>
