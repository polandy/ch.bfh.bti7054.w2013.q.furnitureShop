<?php
if ((isset($_POST["action"]) && $_POST["action"] == "addToChart") &&
    (isset($_POST["f"]))) {
    $fs = \service\FurnitureService::getInstance();
    $furniture = $fs->findFurnitureById($_POST["f"]);
    if ($furniture == null) {
        echo "Furniture not found!"; //TODO handle!
    }
//    $chart = $_SESSION['chart'];
//    if ($chart == null) {
//        $chart = array();
//    }
//    $chart[] = $furniture;
//    $_SESSION['chart'] = $chart;

//    print_r($chart);
}