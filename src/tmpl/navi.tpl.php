<?php
// Navigation page (above with categories and search)
?>
<div class="row">
    <div class="large-3 columns">
        <a href='./index.php'><h1><img src="./images/logo.gif"/>furniturus</h1></a>
    </div>
    <div class="large-3 columns">
        <ul>
            <?php if ($TPL["loggedin"]) { ?>
                <?= $TPL["msg"]->getName("navi_loggedinAs") ?><a href="?pageId=97"><?= $TPL["name"] ?></a> -
                <a href="?pageId=98"><?= $TPL["msg"]->getName("navi_logout") ?></a>
            <?php } else { ?>
                <a href="?pageId=99"><?= $TPL["msg"]->getName("login_login") ?></a> /
                <a href="?pageId=97"><?= $TPL["msg"]->getName("navi_register") ?></a>
            <?php } ?>
        </ul>
    </div>
    <div class="large-6 columns">
        <div class="row">
            <div class="columns large-12">
                <ul class="inline-list right">
                    <?php
                    foreach (\service\CategoryService::getInstance()->getAllCategories() as $cat) {
                        echo '<li><a href="?pageId=2&catId=' . $cat->getId() . '">' . $cat->getName() . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row right">
            <div class="columns large-12">
                <input type="text" id="searchbox" placeholder="Search..."/>
                <div id="searchresults">
                </div>
            </div>
        </div>
    </div>
</div>