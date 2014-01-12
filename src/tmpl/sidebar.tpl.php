<div class="large-3 pull-9 columns">

    <ul class="side-nav">
        <?php
        $categoryId = Config::getInstance()->getPageIdByValue('category');
        $category = null;
        // if an article is selected, the articles from the same category must be displayed anyway
        if (isset($_GET['f'])) {
            $furniture = \service\FurnitureService::getInstance()->findFurnitureById($_GET['f']);
            if ($furniture != null) {
                $category = \service\CategoryService::getInstance()->findCategoryById($furniture->categoryId);
            }
        }

        if (isset($_GET["pageId"]) && ($_GET["pageId"] == $categoryId || $category != null)) {
            $msgService = \service\MsgService::getInstance();
            if ($category == null && isset($_GET["catId"])) {
                $id = $_GET["catId"];
                $category = \service\CategoryService::getInstance()->findCategoryById($id);
            }

            $furnitures = \service\FurnitureService::getInstance()->findFurnitureByCategory($category);
            $articlePageId = Config::getInstance()->getPageIdByValue('article');
            foreach ($furnitures as $f) {
                $furnitureId = $f->getId();
                echo "<li>";
                echo "<a href='?pageId=$articlePageId&f=$furnitureId'>" . $msgService->getName($f) . "</a>";
                echo "</li>";
            }
        } else {
            // TODO invalid URL
        }
        // TODO Möbel für Kategorie aufgelistet
        ?>
    </ul>
</div>