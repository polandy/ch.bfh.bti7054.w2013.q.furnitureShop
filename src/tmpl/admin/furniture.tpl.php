<?php $f = $TPL['furniture'] ?>
<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">

        <h3><?=$TPL["title"]?></h3>

        <form method="POST">
            <div class="row">
                <div class="large-4 columns">
                    <p>Category</p>
                </div>
                <div class="large-6 columns pull-2">
                    <?php
                    ?>
                    <select name="category" id="category" class="medium">
                    <?php
                    $allCategories = \service\CategoryService::getInstance()->getAllCategories();
                    foreach ($allCategories as $cat) {
                        echo '<option value="' . $cat->getId() . '">' . $cat->getName() . '</option>';
                    }
                    ?>
                    </select>
                </div>
            </div>
            <!-- Name DE -->
            <div class="row">
                <div class="large-4 columns">
                    <p>Furniture name de</p>
                </div>
                <div class="large-6 columns pull-2">
                    <input type="text" name="name_de" required="true" pattern="\w{3,}*" value="<?=$f->getNameDe();?>"/>
                </div>
            </div>
            <!-- Name EN -->
            <div class="row">
                <div class="large-4 columns">
                    <p>Furniture name en</p>
                </div>
                <div class="large-6 columns pull-2">
                    <input type="text" name="name_en" required="true" pattern="\w{3,}*" value="<?=$f->getNameEn();?>"/>
                </div>
            </div>
            <!-- Price -->
            <div class="row">
                <div class="large-4 columns">
                    <p>Price</p>
                </div>
                <div class="large-6 columns pull-2">
                    <input type="text" name="price" required="true" pattern="[-+]?[0-9]*\.?[0-9]*" value="<?=$f->getBasicPrice();?>"/>
                </div>
            </div>

            <!-- Description DE -->
            <div class="row">
                <div class="large-4 columns">
                    <p>Description de</p>
                </div>
                <div class="large-6 columns pull-2">
                    <textarea required="true" name="desc_de"><?=$f->getDescriptionDe();?></textarea>
                </div>
            </div>

            <!-- Description DE -->
            <div class="row">
                <div class="large-4 columns">
                    <p>Description en</p>
                </div>
                <div class="large-6 columns pull-2">
                    <textarea required="true" name="desc_en"><?=$f->getDescriptionEn();?></textarea>
                </div>
            </div>


            <div class="right pull-2">
                <input type="hidden" name="action" value="<?=$TPL['btnAction']?>" />
                <input type="submit" value="<?=$TPL['btnLabel']?>" class="button"/>
            </div>
        </form>
    </div>


</div>