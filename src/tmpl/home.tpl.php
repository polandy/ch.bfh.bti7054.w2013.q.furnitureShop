<?php
/**
 * template for the home site
 */
?>
<div class="row">
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="large-12 columns">

        <h2 class="subheader">Welcome
            <small> to M&ouml;bius furniturus</small>
        </h2>

        <img src="<?=Config::getInstance()->webImgDir . 'index.jpg'?>" />
        <?=\service\MsgService::getInstance()->getMsg("homepage")?>

    </div>
</div>