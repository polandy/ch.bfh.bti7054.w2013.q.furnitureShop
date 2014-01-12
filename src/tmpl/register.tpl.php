<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">

        <h3><?= $TPL["title"]?></h3>

        <form method="POST">
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_firstname") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="firstName" required="true" value="<?= $TPL["firstName"]?>"/>
                </div>
            </div>
            <?php if (isset($TPL["errFirstName"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?=$TPL["errFirstName"]?>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_lastname") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="lastName" required="true" value="<?= $TPL["lastName"]?>"/>
                </div>
            </div>
            <?php if (isset($TPL["errLastName"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?=$TPL["errLastName"]?>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_address") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="address" required="true" value="<?= $TPL["address"]?>"/>
                </div>
            </div>
            <?php if (isset($TPL["errAddress"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?=$TPL["errAddress"]?>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_zip") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="number" min="1000" max="9999" name="zip" required="true" value="<?= $TPL["zip"]?>"/>
                </div>
            </div>
            <?php if (isset($TPL["errZip"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?=$TPL["errZip"]?>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_tel") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="tel" name="tel" required="true" value="<?= $TPL["tel"]?>"/>
                </div>
            </div>
            <?php if (isset($TPL["errTel"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?=$TPL["errTel"]?>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_sex") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <select name="male" required="true">
                        <option value="1" <?= $TPL["male"] ? "selected": ""?>><?= $TPL["msg"]->getName("register_male") ?></option>
                        <option value="0" <?= $TPL["male"] ? "": "selected"?>><?= $TPL["msg"]->getName("register_female") ?></option>
                    </select>
                </div>
            </div>
            <?php if(!$TPL["updateProfile"]){ ?>
                <div class="row">
                    <div class="large-3 columns">
                        <p><?= $TPL["msg"]->getName("register_email") ?></p>
                    </div>
                    <div class="large-6 columns pull-3">
                        <input type="email" name="email" required="true" value="<?= $TPL["email"]?>"/>
                    </div>
                </div>
                <?php if (isset($TPL["errEmail"])) { ?>
                    <div class="row">
                        <div class="large-9 columns">
                            <?=$TPL["errEmail"]?>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="large-3 columns">
                        <p><?= $TPL["msg"]->getName("register_username") ?></p>
                    </div>
                    <div class="large-6 columns pull-3">
                        <input type="text" name="username" required="true" value="<?= $TPL["username"]?>"/>
                    </div>
                </div>
                <?php if (isset($TPL["errUsername"])) { ?>
                    <div class="row">
                        <div class="large-9 columns">
                            <?=$TPL["errUsername"]?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_password") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="password" name="password"/>
                </div>
            </div>
            <?php if (isset($TPL["errPassword"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?=$TPL["errPassword"]?>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_passwordVerify") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="password" name="passwordVerify"/>
                </div>
            </div>
            <?php if (isset($TPL["errPasswordVerify"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?=$TPL["errPasswordVerify"]?>
                    </div>
                </div>
            <?php } ?>
            <div class="right pull-3">
                <input type="submit" value="<?=$TPL["actionName"]?>" class="button"/>
            </div>
            <?php if (isset($TPL["success"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?=$TPL["success"]?>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
</div>