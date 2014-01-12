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
            <div class="columns large-7">
                <div class="row">
                    <div class="columns large-12">
                        <div class="large-7 columns"><?= $TPL["desc"] ?></div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="columns large-3">
                    <span><?=$TPL['furniture']->getBasicPrice();?> CHF</span>
                    </div>
                    <div class="columns large-6">
                        <input type="hidden" name="action" value="addToCart"/>
                        <input type="hidden" name="f" value="<?= $TPL["furnitureId"] ?>"/>
                        <input type="submit" value="<?= $TPL["addToCart"] ?>" class="button"/>
                    </div>
                </div>
                <?php
                $features = $TPL['features'];
                $furniture = $TPL['furniture'];
                if (sizeof($features) > 0 ) {
                    echo '<h4>' . $TPL['msg']->getName('article_features') . '</h4>';
                }
                foreach ($features as $feature) {
                    $totalPrice = $feature->getExtraPrice() + $furniture->getBasicPrice();
                    echo '<div class="row">';
                    echo '  <div class="columns large-5">';
                    echo "      <span>" . $TPL['msg']->getName($feature) . ", " . $totalPrice . " CHF</span>";
                    echo '  </div>';
                    echo '  <div class="columns large-5 pull-2">';
                    echo "      <input type='hidden' name='featureId' value='" . $feature->getId() . "' /> ";
                    echo "      <input type='submit' value='" . $TPL["addToCart"] . "' class='button small' /> ";
                    echo '  </div>';
                    echo '</div>';
                }
                ?>
            </div>

        </div>
    </form>
</div>