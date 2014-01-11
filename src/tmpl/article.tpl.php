<?php

$articlePageId = Config::getInstance()->getPageIdByValue('article');
$furniture = null;
$msgService = \service\MsgService::getInstance();
if (isset($_GET["pageId"]) && $_GET["pageId"] == $articlePageId && isset($_GET["f"])) {
    $furnitureService = \service\FurnitureService::getInstance();
    $furnitureId = $_GET["f"];
    $furniture = $furnitureService->findFurnitureById($furnitureId);
} else {
    // TODO invalid URL
}
?>

<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">

        <h3><?php echo $msgService->getName($furniture);?></h3>

        <form method="POST">
            <div class="row">
                <div class="large-5 columns">
<!--                    <img src="http://placehold.it/400x300">-->
                    <img src="http://placehold.it/300x465&text=Image">
                </div>
                <div class="large-7 columns">
                    <?php echo $msgService->getDescription($furniture) ?>
                </div>
            </div>
            <div class="right pull-3">
                <input type="hidden" name="action" value="addToChart"/>
                <input type="hidden" name="f" value="<?php if (isset($furniture)) echo $furniture->getId(); ?>"/>
                <input type="submit" value="<?php $msgService->renderMsg('addToChart')?>" class="button"/>
            </div>
        </form>
    </div>


</div>