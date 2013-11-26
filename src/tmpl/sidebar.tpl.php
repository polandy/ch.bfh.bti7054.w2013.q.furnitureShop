<div class="large-3 pull-9 columns">

    <ul class="side-nav">
<!--        <li><a href="index.php?pageId=3&catId=--><?//=$catId?><!--">Tische</a></li>-->

        <?php
        foreach (\service\CategoryService::getInstance()->getAllCategories() as $cat) {
            echo '<li><a href="#">'.$cat->getName().'</a></li>';
        }
        ?>
    </ul>
</div>