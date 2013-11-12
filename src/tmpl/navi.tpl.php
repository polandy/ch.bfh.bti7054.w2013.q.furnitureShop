<div class="row">
    <div class="large-3 columns">
        <h1><img src="http://placehold.it/400x100&text=Logo" />fsd</h1>
    </div>
    <div class="large-9 columns">
        <ul class="inline-list right">
            <?php
            foreach (CategoryService::getAllCategories() as $cat) {
                echo '<li><a href="#">'.$cat.'</a></li>';

            }
            ?>
<!--            <li><a href="#">Section 2</a></li>-->
<!--            <li><a href="#">Section 3</a></li>-->
<!--            <li><a href="#">Section 4</a></li>-->
        </ul>
    </div>
</div>