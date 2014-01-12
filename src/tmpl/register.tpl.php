<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">

        <h3><?= $TPL["msg"]->getName("login_title") ?></h3>

        <form method="POST">
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_firstname") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="firstname" required="true" value="<?= $TPL["firstname"]?>"/>
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_lastname") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="lastname" required="true" value="<?= $TPL["lastname"]?>"/>
                </div>
            </div>
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
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_email") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="email" name="email" required="true" value="<?= $TPL["email"]?>"/>
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_username") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="username" required="true" value="<?= $TPL["username"]?>"/>
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_password") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="password" name="password" required="true"/>
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <p><?= $TPL["msg"]->getName("register_passwordVerify") ?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="password" name="passwordVerify" required="true"/>
                </div>
            </div>
            <?php if (isset($TPL["errorMsg"])) { ?>
                <div class="row">
                    <div class="large-9 columns">
                        <?=$TPL["errorMsg"]?>
                    </div>
                </div>
            <?php } ?>
            <div class="right pull-3">
                <input type="submit" value="Login" class="button"/>
            </div>
        </form>
    </div>
</div>