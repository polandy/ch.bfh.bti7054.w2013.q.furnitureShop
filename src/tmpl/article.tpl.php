<?php
// Display a furniture with its features
?>

<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">


        <div class="row">
            <div class="large-6 columns"><h3><?= $TPL["name"] ?></h3></div>
            <?php
            echo "<div class='large-6 columns'>";
            if (Config::getInstance()->isAdmin()) {
                $link = 'index.php?pageId=200&edit=1&f=' . $TPL['furnitureId'];
                echo "<a href=$link>" . $TPL['msg']->getMsg('edit') . "</a>";
            }
            echo "</div>";
            ?>
        </div>
    </div>

    <form method="POST">
        <div class="row">
            <div class="large-5 columns">
                <img src="http://placehold.it/300x465&text=Image">
            </div>
            <div class="large-7 columns"><?= $TPL["desc"] ?></div>
        </div>
        <div class="right pull-3">
            <input type="hidden" name="action" value="addToChart"/>
            <input type="hidden" name="f" value="<?= $TPL["furnitureId"] ?>"/>
            <input type="submit" value="<?= $TPL["addToChart"] ?>" class="button"/>
        </div>
    </form>
</div>