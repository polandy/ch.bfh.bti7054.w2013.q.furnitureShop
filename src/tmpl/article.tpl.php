<?php
/**
 * template for the article site
 */
// Display a furniture with its features
$furniture = $TPL["furniture"];
?>

<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">


        <div class="row">
            <div class="large-6 columns"><h3 class="subheader"><?= $TPL["name"] ?></h3></div>
            <div class='large-6 columns'>
                <span class="radius secondary label right">
            <?php
            if (Config::getInstance()->isAdmin()) {
                $link = 'index.php?pageId=200&edit=1&f=' . $TPL['furnitureId'];
                echo "<a href=$link>" . $TPL['msg']->getMsg('edit') . "</a>";
            }
            ?>
                    </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="large-5 columns">
            <div class="columns">
                <img alt="<?=$TPL['msg']->getName($furniture)?>" src="<?=$furniture->getImgUrl()?>">
            </div>
        </div>
        <div class="columns large-7">
            <div class="row">
                <div class="columns large-12">
                    <div class="large-7"><?= $TPL["desc"] ?></div>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="columns large-3">
                    <span><?= $TPL['furniture']->getBasicPrice(); ?> CHF</span>
                </div>
                <div class="columns large-6">
                    <form method="POST">
                        <input type="hidden" name="action" value="addToCart"/>
                        <input type="hidden" name="f" value="<?= $TPL["furnitureId"] ?>"/>
                        <input type="submit" value="<?= $TPL["addToCart"] ?>" class="button"/>
                    </form>
                </div>
            </div>
            <?php
            $features = $TPL['features'];
            $furniture = $TPL['furniture'];
            if (sizeof($features) > 0) {
                echo '<h4>' . $TPL['msg']->getName('article_features') . '</h4>';
            }
            foreach ($features as $feature) {
                $totalPrice = $feature->getExtraPrice() + $furniture->getBasicPrice();
                ?>
                <div class="row">
                    <div class="columns large-5">
                        <span><?= $TPL['msg']->getName($feature) . ", " . $totalPrice ?> CHF</span>
                    </div>

                    <div class="columns large-5 pull-2">
                        <form method="POST">
                            <input type="hidden" name="f" value="<?= $TPL["furnitureId"] ?>"/>
                            <input type='hidden' name='featureId' value='<?= $feature->getId() ?>'/>
                            <input type='hidden' name='action' value='addToCart'/>
                            <input type='submit' value='<?= $TPL["addToCart"] ?>' class='button small'/>
                        </form>
                    </div>

                </div>
            <?php } ?>
        </div>

    </div>
    </form>
</div>