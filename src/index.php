<?php
session_start();

require_once 'php/Autoloader.class.php';
new Autoloader();


$config = Config::getInstance();
$tpl = new TemplateEngine();
/**
 * Services
 */

$furnitureService = \service\FurnitureService::getInstance();

?>

<html>
<?php $tpl->display("header"); ?>
<body>
<div class="wrapper">
    <?php
    include ($config->controllerDir . "navi.php");
    $tpl->display("navi");
    ?>
    <div class="row">
        <div class="large-9 push-3 columns">
            <?php
            $pageId = isset($_GET["pageId"]) ? $_GET["pageId"] : null;
            if (isset($pageId)) {
                $pageName = $config->pageIds[$pageId];
                if (!isset($pageName) || !is_file($config->controllerDir . $pageName . ".php")) {
                    $tpl->display("error");
                } else {
                    if (include ($config->controllerDir . $pageName) . ".php") $tpl->display($pageName); # Only show the template when the inclusion was ok (access...)
                }
            } else {
                if (include ($config->controllerDir . "home") . ".php") $tpl->display("home"); # Only show the template when the inclusion was ok (access...)
            }
            ?>
        </div>

        <!-- Load Sidebar -->
        <!-- This is source ordered to be pulled to the left on larger screens -->
        <?php include ($config->controllerDir . "sidebar.php");
        $tpl->display("sidebar"); ?>

    </div>


</div>


<?php
include ($config->controllerDir . "footer.php");
$tpl->display("footer");
?>
</div>
<!--wrapper div-->
</body>
</html>