<?php
require_once 'tools/common.php';

if(isset($_GET['category_kind']) ){ //si une catégorie est demandée via un id en URL

    //selection de la catégorie en base de données
    $query = $db->prepare('SELECT * FROM category_kind WHERE id = ?');
    $query->execute( array($_GET['category_kind']) );

    $currentCategoryKind = $query->fetch();

    if($currentCategoryKind){ //Si la catégorie demandé existe bien

        //récupération des articles publiés qui sont liés à la catégorie ET publiés
        $query = $db->prepare('
			SELECT item.*
			FROM item
			JOIN item_category ON item.id = item_category.item_id 
			JOIN category_kind ON item_category.category_kind_id = category_kind.id
			JOIN category_item ON item_category.category_item_id = category_item.id
			WHERE item.is_published = 1 AND category_kind.id = ? AND category_item.id = 1 
			GROUP BY item.id
			ORDER BY created_at
		');

        $result = $query->execute( array($_GET['category_kind']) );
        //fetchAll() renvoie un ensemble d'enregistrements (tableau), le résultat sera à traiter avec un boucle foreach
        $itemsShirt = $query->fetchAll();
    }
    else{ //si la catégorie n'existe pas, redirection vers la page d'accueil
        header('location:index.php');
        exit;
    }
    if($currentCategoryKind){ //Si la catégorie demandé existe bien

        //récupération des articles publiés qui sont liés à la catégorie ET publiés
        $query = $db->prepare('
			SELECT item.*
			FROM item
			JOIN item_category ON item.id = item_category.item_id 
			JOIN category_kind ON item_category.category_kind_id = category_kind.id
			JOIN category_item ON item_category.category_item_id = category_item.id
			WHERE item.is_published = 1 AND category_kind.id = ? AND category_item.id = 2 
			GROUP BY item.id
			ORDER BY created_at
		');

        $result = $query->execute( array($_GET['category_kind']) );
        //fetchAll() renvoie un ensemble d'enregistrements (tableau), le résultat sera à traiter avec un boucle foreach
        $itemsSweat = $query->fetchAll();
    }
    else{ //si la catégorie n'existe pas, redirection vers la page d'accueil
        header('location:index.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Original'creatioN</title>
    <?php require 'partials/head_assets.php'; ?>
</head>

<body class="body">
<?php  require 'partials/header.php';?>

<?php if(!empty($currentCategoryKind['image'])): ?>
    <img src="image/image-all/<?php echo $currentCategoryKind['image'] ?>" class="img-fluid" alt="Responsive image">
<?php endif; ?>

<div class="container-fluid">
    <div class="row">
        <div class="container">
            <ul class="pt-5 nav nav-tabs justify-content-center nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link nav-link-kind <?php if(isset($_POST['teeshirt']) || !isset($_POST['sweatshirt'])): ?>active<?php endif; ?>" data-toggle="tab" href="#teeshirt" role="tab">Tee shirt</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link nav-link-kind <?php if(isset($_POST['sweatshirt'])): ?>active<?php endif; ?>" data-toggle="tab" href="#sweatshirt" role="tab">Sweat shirt</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane container-fluid <?php if(isset($_POST['teeshirt']) || !isset($_POST['sweatshirt'])): ?>active<?php endif; ?>" id="teeshirt" role="tabpanel">
            <div class="row pt-5 pb-5 d-flex align-items-center justify-content-center item-woman">
                <div class="container">
                    <div class="row" >
                        <?php if(!empty($itemsShirt)): ?>
                            <?php foreach ($itemsShirt as $key => $itemShirt): ?>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 d-flex align-items-center justify-content-center">
                                    <?php if(!empty($itemShirt['image'])): ?>
                                        <div class="d-flex align-items-center justify-content-around main-items hvr-glow">
                                            <a href="item-page.php?item_id=<?php echo $itemShirt['id']; ?>">
                                                <img class="image-index" src="image/image-all/<?php echo $itemShirt['image']; ?>" alt="<?php echo $itemShirt['title']; ?>">
                                                <h5 class="text-center mt-2"><?php echo $itemShirt['title']?></h5>
                                                <p class="text-center"><?php echo $itemShirt['price']?>€</p>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>

                            Aucun item dans cette catégorie...
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>










        <div class="tab-pane container-fluid <?php if(isset($_POST['sweatshirt'])): ?>active<?php endif; ?>" id="sweatshirt" role="tabpanel">
            <div class="row pt-5 pb-5 d-flex align-items-center justify-content-center item-woman">
                <div class="container">
                    <div class="row">




                        <?php if(!empty($itemsSweat)): ?>
                            <?php foreach ($itemsSweat as $key => $itemSweat): ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 d-flex align-items-center justify-content-center">
                                <?php if(!empty($itemSweat['image'])): ?>
                                    <div class="d-flex align-items-center justify-content-around main-items hvr-glow">
                                        <a href="item-page.php?item_id=<?php echo $itemSweat['id']; ?>">
                                            <img class="image-index" src="image/image-all/<?php echo $itemSweat['image']; ?>" alt="<?php echo $itemSweat['title']; ?>">
                                            <h5 class="mt-2 text-center"><?php echo $itemSweat['title']?></h5>
                                            <p class="text-center"><?php echo $itemSweat['price']?>€</p>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            Aucun item dans cette catégorie...
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'partials/footer.php';?>
    <?php require 'partials/footer_js.php';?>
</div>
</body>
</html>
