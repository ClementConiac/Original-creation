<?php

require_once 'tools/common.php';

if(isset($_GET['logout']) && isset($_SESSION['user'])){

    unset($_SESSION["user"]);
    unset($_SESSION["is_admin"]);
}



$queryImageModel = $db->query('
            SELECT item.* , image.*
            FROM item
            JOIN image 
            ON image.item_id = item.id
            WHERE image.model = 1 AND image.back = 0 AND image.item_id >= 120 AND image.item_id <=121
            ORDER BY RAND()
            LIMIT 1'
);
$queryImage1 = $db->query('
            SELECT *
            FROM item
            WHERE item.is_published = 1 AND item.id >= 119 AND item.id <=124
            ORDER BY RAND()
            LIMIT 1'
);
$queryImageModel2 = $db->query('
            SELECT item.* , image.*
            FROM item
            JOIN image 
            ON image.item_id = item.id
            WHERE image.model = 1 AND image.back = 0 AND image.item_id >= 123 AND image.item_id <=128
            ORDER BY RAND()
            LIMIT 1'
);
$queryImage2 = $db->query('
            SELECT *
            FROM item
            WHERE item.is_published = 1 AND item.id >= 125 AND item.id <=130
            ORDER BY RAND()
            LIMIT 1'
);
$queryImageMode3 = $db->query('
            SELECT item.* , image.*
            FROM item
            JOIN image 
            ON image.item_id = item.id
            WHERE image.model = 1 AND image.back = 0 AND image.item_id >= 131 AND image.item_id <=133
            ORDER BY RAND()
            LIMIT 1'
);
$queryImage3 = $db->query('
            SELECT *
            FROM item
            WHERE item.is_published = 1 AND item.id >= 131 AND item.id <=134
            ORDER BY RAND()
            LIMIT 1'
);
$queryImageModel4 = $db->query('
            SELECT item.* , image.*
            FROM item
            JOIN image 
            ON image.item_id = item.id
            WHERE image.model = 1 AND image.back = 0 AND image.item_id >= 134 AND image.item_id <=137
            ORDER BY RAND()
            LIMIT 1'
);
$queryImage4 = $db->query('
            SELECT *
            FROM item
            WHERE item.is_published = 1 AND item.id >= 135 AND item.id <=148
            ORDER BY RAND()
            LIMIT 1'
);
    $queryImageModel5 = $db->query('
            SELECT item.* , image.*
            FROM item
            JOIN image 
            ON image.item_id = item.id
            WHERE image.model = 1 AND image.back = 0 AND image.item_id >= 138 AND image.item_id <=141
            ORDER BY RAND()
            LIMIT 1'
    );
    $queryImage5 = $db->query('
            SELECT *
            FROM item
            WHERE item.is_published = 1 AND item.id >= 149 AND item.id <=151
            ORDER BY RAND()
            LIMIT 1'
    );
    $queryImageModel6 = $db->query('
            SELECT item.* , image.*
            FROM item
            JOIN image 
            ON image.item_id = item.id
            WHERE image.model = 1 AND image.back = 0 AND image.item_id >= 142 AND image.item_id <=151
            ORDER BY RAND()
            LIMIT 1'
    );
    $queryImage6 = $db->query('
            SELECT *
            FROM item
            WHERE item.is_published = 1 AND item.id >= 153 AND item.id <=168
            ORDER BY RAND()
            LIMIT 1'
    );
    $queryKind = $db->query('SELECT * FROM category_kind');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Original'creatioN</title>
    <?php require 'partials/head_assets.php'; ?>

</head>
<body class="body">
<?php  require 'partials/header.php';?>
<div class="container-fluid">
    <div class="row hidden-sm-down">
        <section class="block">
            <div class="carousel slide" id="featured" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active item">
                        <img class="d-block img-fluid" src="image/utilitaire/background-carousel-1.jpg" alt="slider1">
                    </div>
                    <div class="carousel-item item">
                        <img class="d-block img-fluid" src="image/utilitaire/background-carousel-2.jpg" alt="slider2">
                    </div>
                    <div class="carousel-item item">
                        <img class="d-block img-fluid" src="image/utilitaire/background-carousel-3.jpg" alt="slider3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#featured" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">
                <span class="sr-only">Previous</span>
            </span>
                </a>
                <a class="carousel-control-next" href="#featured" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">
                <span class="sr-only">Next</span>
            </span>
                </a>
            </div>
        </section>
    </div>
    <div class="row nav-category">
        <div class="container">
            <ul class="nav justify-content-center p-4">
                <?php while($category_kind = $queryKind->fetch()): ?>
                    <li class="pl-4 pr-4"><a href="all-item.php?category_kind=<?php echo $category_kind['id']; ?>"><?php echo $category_kind['name']; ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <div class="row main-index" >
        <div class="container d-flex">
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <?php while($imageModel = $queryImageModel->fetch()): ?>
                        <?php if(!empty($imageModel['name'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $imageModel['item_id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $imageModel['name']; ?>" alt="<?php echo $imageModel['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php while($item1 = $queryImage1->fetch()): ?>
                        <?php if(!empty($item1['image'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $item1['id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $item1['image']; ?>" alt="<?php echo $item1['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php while($imageModel2 = $queryImageModel2->fetch()): ?>
                        <?php if(!empty($imageModel2['name'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $imageModel2['item_id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $imageModel2['name']; ?>" alt="<?php echo $imageModel2['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php while($item2 = $queryImage2->fetch()): ?>
                        <?php if(!empty($item2['image'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $item2['id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $item2['image']; ?>" alt="<?php echo $item2['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>



                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">

                    <?php while($item3 = $queryImage3->fetch()): ?>
                        <?php if(!empty($item3['image'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $item3['id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $item3['image']; ?>" alt="<?php echo $item3['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php while($imageMode3 = $queryImageMode3->fetch()): ?>
                        <?php if(!empty($imageMode3['name'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $imageMode3['item_id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $imageMode3['name']; ?>" alt="<?php echo $imageMode3['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php while($item4 = $queryImage4->fetch()): ?>
                        <?php if(!empty($item4['image'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $item4['id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $item4['image']; ?>" alt="<?php echo $item4['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php while($imageMode4 = $queryImageModel4->fetch()): ?>
                        <?php if(!empty($imageMode4['name'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $imageMode4['item_id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $imageMode4['name']; ?>" alt="<?php echo $imageMode4['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>



                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <?php while($imageModel5 = $queryImageModel5->fetch()): ?>
                        <?php if(!empty($imageModel5['name'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $imageModel5['item_id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $imageModel5['name']; ?>" alt="<?php echo $imageModel5['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php while($item5 = $queryImage5->fetch()): ?>
                        <?php if(!empty($item5['image'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $item5['id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $item5['image']; ?>" alt="<?php echo $item5['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php while($imageModel6 = $queryImageModel6->fetch()): ?>
                        <?php if(!empty($imageModel6['name'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $imageModel6['item_id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $imageModel6['name']; ?>" alt="<?php echo $imageModel6['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php while($item6 = $queryImage6->fetch()): ?>
                        <?php if(!empty($item6['image'])): ?>
                            <div class="style-hover d-flex justify-content-center align-items-center hvr-glow">
                                <a href="item-page.php?item_id=<?php echo $item6['id']; ?>" >
                                    <img class="image-index" src="image/image-all/<?php echo $item6['image']; ?>" alt="<?php echo $item6['title']; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>

        </div>
    </div>
    <?php require 'partials/footer.php';?>
    <?php require 'partials/footer_js.php';?>
</div>
</body>
</html>