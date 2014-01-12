<?php

$action_add = "addFurniture";
$action_edit = 'editFurniture';

$furnitureId = isset($_GET["f"]) ? $_GET["f"] : null;

$msgService = \service\MsgService::getInstance();
$furnitureService = \service\FurnitureService::getInstance();

if (isset($furnitureId)) {
    $furniture = $furnitureService->findFurnitureById($furnitureId);
    if ($furniture != null) {
        // Edit Furniture
        $tpl->assign("title", $msgService->getMsg('furniture_edit'));
        $tpl->assign("furniture", $furniture);
        $tpl->assign("btnAction", $action_edit);
        $tpl->assign("btnLabel", $msgService->getMsg('furniture_save'));
        $tpl->assign("addFeatures", true);
    } else {
        header("Location: ./index.php?pageId=404");
    }
} else {
    // Create a new Furniture
    $tpl->assign("title", $msgService->getMsg('furniture_create'));
    $tpl->assign("furniture", new \model\Furniture());
    $tpl->assign("btnAction", $action_add);
    $tpl->assign("btnLabel", $msgService->getMsg('furniture_creatBtn'));
    $tpl->assign("addFeatures", false);
}

// handle button actions
if (isset($_POST["action"])) {
    $action = $_POST["action"];

    if (isset($_POST["category"])) {
        $categoryId = $_POST["category"];
        $catService = \service\CategoryService::getInstance();
        $category = $catService->findCategoryById($categoryId);
        if ($category == null) {
            //TODO handle
        }
        // All Attributes must be set for edit and create a new furniture!
        if (allAttributesAreSet()) {
            $furniture = new \model\Furniture(htmlentities($_POST["name_de"]), htmlentities($_POST["name_en"]), $_POST["price"], $category, htmlentities($_POST["desc_de"]), htmlentities($_POST["desc_en"]));
            if ($action == $action_add) {
                $furnitureService->addFurniture($furniture);
            } elseif ($action == $action_edit) {
                $furniture->setId($furnitureId);
                $furnitureService->updateFurniture($furniture);
            }
        } else {
            \service\MsgService::getInstance()->renderErrorMsg('notAllAttributesSet');
        }
        \service\MsgService::getInstance()->renderSuccessMsg('savedSuccess');
    } elseif(isset($_POST["furnitureId"]) && $action == 'addNewFeature') {
        // check whether all attributes are set
        if (isset($_POST['desc_de']) && isset($_POST['desc_en']) && isset($_POST['additionalPrice'])) {
            $feature = new \model\Feature($_POST['additionalPrice'], $furnitureId, $_POST['desc_de'], $_POST['desc_en']);
            $furnitureService->addFeatureForFurniture($feature);
        } else {
            // handle not all attributes are set
        }
    }
}

function allAttributesAreSet()
{
    return isset($_POST["name_de"]) && isset($_POST["name_en"]) && isset($_POST["price"]) &&
    isset($_POST["desc_de"]) && isset($_POST["desc_en"]);
}