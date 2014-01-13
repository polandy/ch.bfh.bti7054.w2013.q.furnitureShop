<?php
// Show the current shopping cart
?>

<div class="row">
    <!-- Main Content Section -->
    <div class="large-12 columns">

        <h3><?= $TPL["msg"]->getName("cart_title") ?></h3>

        <form method="POST">
            <div class="row">
                <table>
                    <thead>
                    <tr>
                        <th><?= $TPL["msg"]->getName("cart_furniture") ?></th>
                        <th><?= $TPL["msg"]->getName("cart_feature") ?></th>
                        <th><?= $TPL["msg"]->getName("cart_singlePrice") ?></th>
                        <th><?= $TPL["msg"]->getName("cart_quantity") ?></th>
                        <th><?= $TPL["msg"]->getName("cart_price") ?></th>
                        <th><?= $TPL["msg"]->getName("cart_remove") ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($TPL["orderFurnitures"] as $orderFurniture) {
                        $furniture = $TPL["furnitureService"]->findFurnitureById($orderFurniture->furnitureId);
                        $feature = $TPL["furnitureService"]->findFeatureById($orderFurniture->featureId);
                        $singlePrice = $furniture->basicPrice + ($feature == null ? 0 : $feature->extraPrice);
                        ?>
                        <tr>
                            <td><?= $TPL["msg"]->getName($furniture) ?></td>
                            <td><?= $TPL["msg"]->getName($feature) ?></td>
                            <td><?= number_format($singlePrice, 2, ".", "'") ?> CHF</td>
                            <td><input style="width:50px" type="number" min="1" value="<?= $orderFurniture->quantity ?>"
                                       name="quantity_<?= $orderFurniture->id ?>"/></td>
                            <td><?= number_format($orderFurniture->quantity * $singlePrice, 2, ".", "'") ?> CHF</td>
                            <td><input type="checkbox" name="remove_<?= $orderFurniture->id ?>"/></td>
                        </tr>
                    <? } ?>
                    </tbody>
                    <tfoot>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?= number_format($TPL["totalPrice"], 2, ".", "'") ?> CHF</th>
                    </tfoot>
                </table>
                <div class="large-6 right">
                    <input type="submit" name="updateCart" value="<?= $TPL["msg"]->getName("cart_update") ?>"
                           class="button"/>
                    <a href="./index.php?pageId=6" class="button"><?= $TPL["msg"]->getName("cart_order") ?></a>
                </div>
        </form>
    </div>
</div>