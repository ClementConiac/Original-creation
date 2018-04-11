<?php

	$nbUsers = $db->query("SELECT COUNT(*) FROM user")->fetchColumn();
	$nbItems = $db->query("SELECT COUNT(*) FROM item")->fetchColumn();
    $nbCategoryKind = $db->query("SELECT COUNT(*) FROM category_kind")->fetchColumn();
    $nbCategoryItem = $db->query("SELECT COUNT(*) FROM category_item")->fetchColumn();
?>

<nav class="col-3 categories-nav">
    <ul>
        <li><a href="user-list.php">Gestion des utilisateurs (<?php echo $nbUsers; ?>)</a></li>
        <li><a href="item-list.php">Gestion des items (<?php echo $nbItems; ?>)</a></li>
        <li><a href="kind-list.php">Gestion des categories kind (<?php echo $nbCategoryKind; ?>)</a></li>
        <li><a href="cat-item-list.php">Gestion des categories items (<?php echo $nbCategoryItem; ?>)</a></li>
    </ul>
</nav>

