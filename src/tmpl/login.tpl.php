<?php
// Login page
?>

<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">
        <h3><?= $TPL["msg"]->getName("login_title") ?></h3>

        <form method="POST">
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("login_name") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="name" required="true" value="<?= $TPL["username"] ?>"/>
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("login_password") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="password" name="password" required="true"/>
                </div>
            </div>
            <?php if (isset($TPL["errorMsg"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?= $TPL["errorMsg"] ?>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="right pull-3">
                    <input type="submit" value="<?= $TPL["msg"]->getName("login_login") ?>" class="button"/>
                </div>
            </div>
            <div class="row">
                <div class="right pull-3">
                    <h5><a href="./index.php?pageId=97"><?= $TPL["msg"]->getName("login_register") ?></a></h5>
                </div>
            </div>
        </form>
    </div>
</div>