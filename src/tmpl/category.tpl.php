<?php
// Display a category

    if (isset($_GET["catId"]) ) {
        $catId = $_GET["catId"];
        $category = \service\CategoryService::getInstance()->findCategoryById($catId);

        echo "hier wird irgendwas für die Kategorie $catId angezeigt";

    }
