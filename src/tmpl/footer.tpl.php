<footer class="row">
    <div class="large-12 columns">
        <hr/>
        <div class="row">
            <div class="large-6 columns">
                <p>&copy; 2013–2013 M&ouml;bius Furniturus, Inc. All rights reserved.</p>
            </div>
            <div class="large-6 columns">
                <ul class="inline-list right">
                    <?php
                    if (Config::getInstance()->isAdmin()) { ?>
                        <li><a href="?pageId=100"><?=$TPL['createCategory']?></a></li>
                        <li><a href="?pageId=200"><?=$TPL['createFurniture']?></a></li>

                    <?php } // end if ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
