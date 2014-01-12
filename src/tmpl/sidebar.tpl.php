<?php
// Sidebar with the categories
?>

<div class="large-3 pull-9 columns">

    <ul class="side-nav">
       <?php
        foreach ($TPL["catFurnitures"] as $f) {?>
            <li>
                <a href='?pageId=3&f=<?=$f->getId()?>'><?=$TPL["msg"]->getName($f)?></a>
            </li>

        <?php } ?>
    </ul>
</div>