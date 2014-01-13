<?php
/**
 * template for the confirmOrder site
 */
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
                    <p><?= $TPL["msg"]->getName("conf_address") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <p><?=$TPL["user"]->firstName?> <?=$TPL["user"]->lastName?><br>
                    <?=$TPL["user"]->address?><br>
                    <?=$TPL["user"]->zip?> <?=$TPL["user"]->place?></p>
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("conf_payment") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <select name="paymentmethod" required="true">
                        <?php foreach ($TPL["paymentMethods"] as $paymentMethod) { ?>
                            <option
                                value="<?= $paymentMethod->id ?>"><?= $TPL["msg"]->getName($paymentMethod) ?></option>
                        <? } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("conf_totalPrice") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <p><strong><?= number_format($TPL["totalPrice"], 2, ".", "'") ?> CHF</strong></p>
                </div>
            </div>
            <div class="large-6 right">
                <a href="./index.php?pageId=5" class="button"><?= $TPL["msg"]->getName("conf_cancel") ?></a>

                <input type="submit" name="orderNow" data-text="<?=$TPL["msg"]->getName("conf_finalCancel")?>" value="<?= $TPL["msg"]->getName("conf_orderNow") ?>"
                       class="button" id="orderNow"/>
            </div>
        </form>
    </div>
</div>