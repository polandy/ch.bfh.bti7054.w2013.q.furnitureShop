<?php
/**
 * Controller of category
 */

if (isset($_GET["catId"])) {
    $catId = $_GET["catId"];
    $cs = \service\CategoryService::getInstance();
    $category = $cs->findCategoryById($catId);

    if (isset($category) || $category != null) {
        //  display image path
        $tpl->assign("catImgPath", $cs->getCategoryImgPath($category));
        $tpl->assign("categoryTitle", \service\MsgService::getInstance()->getName($category));
    } else {
        header("Location: ./index.php?pageId=404");
    }

}