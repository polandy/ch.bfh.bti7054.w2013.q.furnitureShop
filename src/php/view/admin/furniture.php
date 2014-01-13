<?php
/**
 * Controller for furniture admin
 */

// actions
$action_add = "addFurniture";
$action_edit = 'editFurniture';
$action_addFeature = "addNewFeature";


// get furnitureId if available
$furnitureId = isset($_GET["f"]) ? $_GET["f"] : null;

// services
$msgService = \service\MsgService::getInstance();
$furnitureService = \service\FurnitureService::getInstance();

// if there is a furnitureId set -> edit Furniture if it exists, otherwise handle the creation of a new funiture
if (isset($furnitureId)) {
    $furniture = $furnitureService->findFurnitureById($furnitureId);
    if ($furniture != null) {
        // Edit Furniture
        $features = $furnitureService->findFeaturesForFurniture($furniture);

        $tpl->assign("title", $msgService->getMsg('furniture_edit'));
        $tpl->assign("furniture", $furniture);
        $tpl->assign("btnAction", $action_edit);
        $tpl->assign("btnLabel", $msgService->getMsg('furniture_save'));
        $tpl->assign("addFeatures", true);
        $tpl->assign("features", $features);
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
            header("Location: ./index.php?pageId=404");
        }
        // All Attributes must be set for edit and create a new furniture!
        if (allAttributesAreSet()) {
            $furniture = new \model\Furniture(htmlentities($_POST["name_de"]), htmlentities($_POST["name_en"]), $_POST["price"], $category, htmlentities($_POST["desc_de"]), htmlentities($_POST["desc_en"]), $_POST['img_url']);
            if ($action == $action_add) {
                $furnitureService->addFurniture($furniture);
            } elseif ($action == $action_edit) {
                $furniture->setId($furnitureId);
                $furnitureService->updateFurniture($furniture);
                // update furniture for view
                $furniture = $furnitureService->findFurnitureById($furnitureId);
                $tpl->assign("furniture", $furniture);

            }
        } else {
            \service\MsgService::getInstance()->renderErrorMsg('notAllAttributesSet');
        }
        \service\MsgService::getInstance()->renderSuccessMsg('savedSuccess');

    // handle add new Feature
    } elseif(isset($_POST["furnitureId"]) && $action == $action_addFeature) {
        // check whether all attributes are set
        if (isset($_POST['desc_de']) && isset($_POST['desc_en']) && isset($_POST['additionalPrice'])) {
            $feature = new \model\Feature($_POST['additionalPrice'], $furnitureId, $_POST['desc_de'], $_POST['desc_en']);
            if (isset($_POST['featureId'])) {
                $feature->setId($_POST['featureId']);
            }
            $furnitureService->addFeatureForFurniture($feature);
            //refresh features for view
            $features = $furnitureService->findFeaturesForFurniture($furniture);
            $tpl->assign("features", $features);
        } else {
            \service\MsgService::getInstance()->renderErrorMsg('notAllAttributesSet');
        }
    }
}

function allAttributesAreSet()
{
    return isset($_POST["name_de"]) && isset($_POST["name_en"]) && isset($_POST["price"]) &&
    isset($_POST["desc_de"]) && isset($_POST["desc_en"]) && isset($_POST["img_url"]);
}