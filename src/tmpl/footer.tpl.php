<?php
/**
 * template for the footer site
 */
?>
<footer class="row">
    <div class="large-12 columns">
        <hr/>
        <div class="row">
            <div class="large-4 columns">
                <h6 id="footerText" class="subheader small"> &copy; 2013–2013 M&ouml;bius Furniturus, Inc. All rights reserved.</h6>
            </div>
            <div class="large-6 columns">
                <ul class="inline-list right">
                    <?php
                    if (Config::getInstance()->isAdmin()) {
                        ?>
                        <li><a href="?pageId=100"><?= $TPL['createCategory'] ?></a></li>
                        <li><a href="?pageId=200"><?= $TPL['createFurniture'] ?></a></li>
                    <?php } // end if ?>
                    <li><a href="?pageId=4"><?= $TPL['impressum'] ?></a></li>
                </ul>
            </div>
            <div class="small-2 columns">
                <ul class="inline-list right">
                    <li><a href='<?= $TPL["langURL"] ?>de'>de</a></li>
                    <li>/</li>
                    <li><a href='<?= $TPL["langURL"] ?>en'>en</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
