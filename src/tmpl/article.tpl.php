<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">

        <h3><?=$TPL["name"]?></h3>

        <form method="POST">
            <div class="row">
                <div class="large-5 columns">
<!--                    <img src="http://placehold.it/400x300">-->
                    <img src="http://placehold.it/300x465&text=Image">
                </div>
                <div class="large-7 columns"><?=$TPL["desc"]?></div>
            </div>
            <div class="right pull-3">
                <input type="hidden" name="action" value="addToChart"/>
                <input type="hidden" name="f" value="<?=$TPL["furnitureId"]?>"/>
                <input type="submit" value="<?=$TPL["addToChart"]?>" class="button"/>
            </div>
        </form>
    </div>
</div>