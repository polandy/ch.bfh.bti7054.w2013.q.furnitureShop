<?php
// Show the current shopping cart
?>

<div class="row">
    <!-- Main Content Section -->
    <div class="large-12 columns">

        <h3><?= $TPL["msg"]->getName("conf_title") ?></h3>

        <?php $totalPrice = 0; ?>
        <form method="POST">
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_sex") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <select name="method" required="true">
                        <option
                            value="1" <?= $TPL["male"] ? "selected" : "" ?>><?= $TPL["msg"]->getName("register_male") ?></option>
                    </select>
                </div>
            </div>
            <div class="large-6 right">
                <input type="submit" name="orderNow" value="<?= $TPL["msg"]->getName("conf_orderNow") ?>"
                       class="button"/>
            </div>
        </form>
    </div>
</div>