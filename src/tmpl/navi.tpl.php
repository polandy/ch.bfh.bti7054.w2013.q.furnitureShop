<div class="row">
    <div class="large-3 columns">
        <a href='./index.php'><h1><img src="http://placehold.it/400x100&text=Möbius"/>furniturus</h1></a>
    </div>
    <div class="large-3 columns">
        <?php if($TPL["loggedin"]) { ?>
            <?=$TPL["msg"]->getName("navi_loggedinAs")." ".$TPL["username"]?> -
            <a href="?pageId=98"><?=$TPL["msg"]->getName("navi_logout")?></a>
        <?php } else { ?>
            <a href="?pageId=99"><?=$TPL["msg"]->getName("login_login")?></a> /
            <a href="?pageId=97"><?=$TPL["msg"]->getName("navi_register")?></a>
        <?php }  ?>
    </div>
    <div class="large-6 columns">
        <ul class="inline-list right">
            <?php
            foreach (\service\CategoryService::getInstance()->getAllCategories() as $cat) {
                echo '<li><a href="?pageId=2&catId=' . $cat->getId() . '">' . $cat->getName() . '</a></li>';
            }
            ?>
        </ul>
    </div>
</div>