<div class="row">
    <div class="large-3 columns">
        <h1><img src="http://placehold.it/400x100&text=Logo" />fsd</h1>
    </div>
    <div class="large-9 columns">
        <ul class="inline-list right">
            <?php
            foreach (\service\CategoryService::getInstance()->getAllCategories() as $cat) {
                echo '<li><a href="#">'.$cat->getNameEn().'</a></li>';
            }
            ?>
        </ul>
    </div>
</div>