<div class="large-3 pull-9 columns">

    <ul class="side-nav">
        <?php
        if (isset($_GET["pageId"]) && $_GET["pageId"] == Config::getInstance()->getPageIdByValue('category')) {
            if (isset($_GET["catId"])) {
                $msgService = \service\MsgService::getInstance();
                $id = $_GET["catId"];
                $category = \service\CategoryService::getInstance()->findCategoryById($id);
                $furnitures = \service\FurnitureService::getInstance()->findFurnitureByCategory($category);
                foreach ($furnitures as $f) {
                    echo "<li>";
                    echo "<a href='#'>" . $msgService->getName($f) . "</a>";
                    echo "</li>";
                }
            } else {
                // TODO handle no category
            }
        }
        // TODO Möbel für Kategorie aufgelistet
        ?>
    </ul>
</div>