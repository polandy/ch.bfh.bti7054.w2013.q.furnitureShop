<div class="row">
    <div class="large-3 columns">
        <a href='./index.php'><h1><img src="http://placehold.it/400x100&text=Möbius" />furniturus</h1></a>
    </div>
    <div class="large-9 columns">
        <ul class="inline-list right">
            <?php
            foreach (\service\CategoryService::getInstance()->getAllCategories() as $cat) {
                echo '<li><a href="?pageId=2&catId='.$cat->getId().'">'.$cat->getName().'</a></li>';
            }
            ?>
        </ul>
    </div>
</div>