<?php $f = $TPL['furniture'] ?>
<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">

        <h3><?= $TPL["title"] ?></h3>

        <form method="POST">
            <div class="row">
                <div class="large-4 columns">
                    <p><?= $TPL['msg']->getMsg('furniture_category') ?></p>
                </div>
                <div class="large-6 columns pull-2">
                    <?php
                    ?>
                    <select name="category" id="category" class="medium">
                        <?php
                        $allCategories = \service\CategoryService::getInstance()->getAllCategories();
                        foreach ($allCategories as $cat) {
                            $selected = $cat->getId() == $f->categoryId ? 'selected' : '';
                            echo '<option ' . $selected . ' value="' . $cat->getId() . '">' . $cat->getName() . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- img url -->
            <div class="row">
                <div class="large-4 columns">
                    <p><?= $TPL['msg']->getMsg('furniture_imgUrl') ?></p>
                </div>
                <div class="large-6 columns pull-2">
                    <input type="url" name="img_url"  required="true" pattern="\w{3,}*"
                           value="<?= $f->getImgUrl(); ?>"/>
                </div>
            </div>
            <!-- Name DE -->
            <div class="row">
                <div class="large-4 columns">
                    <p><?= $TPL['msg']->getMsg('furniture_nameDe') ?></p>
                </div>
                <div class="large-6 columns pull-2">
                    <input type="text" name="name_de" required="true" pattern="\w{3,}*"
                           value="<?= $f->getNameDe(); ?>"/>
                </div>
            </div>
            <!-- Name EN -->
            <div class="row">
                <div class="large-4 columns">
                    <p><?= $TPL['msg']->getMsg('furniture_nameEn') ?></p>
                </div>
                <div class="large-6 columns pull-2">
                    <input type="text" name="name_en" required="true" pattern="\w{3,}*"
                           value="<?= $f->getNameEn(); ?>"/>
                </div>
            </div>
            <!-- Price -->
            <div class="row">
                <div class="large-4 columns">
                    <p><?= $TPL['msg']->getMsg('furniture_price') ?></p>
                </div>
                <div class="large-6 columns pull-2">
                    <input type="text" name="price" required="true" pattern="[-+]?[0-9]*\.?[0-9]*"
                           value="<?= $f->getBasicPrice(); ?>"/>
                </div>
            </div>

            <!-- Description DE -->
            <div class="row">
                <div class="large-4 columns">
                    <p><?= $TPL['msg']->getMsg('furniture_descriptionDe') ?></p>
                </div>
                <div class="large-8 columns">
                    <textarea required="true" name="desc_de"><?= $f->getDescriptionDe(); ?></textarea>
                </div>
            </div>

            <!-- Description DE -->
            <div class="row">
                <div class="large-4 columns">
                    <p><?= $TPL['msg']->getMsg('furniture_descriptionEn') ?></p>
                </div>
                <div class="large-8 columns">
                    <textarea required="true" name="desc_en"><?= $f->getDescriptionEn(); ?></textarea>
                </div>
            </div>


            <div class="right pull-2">
                <input type="hidden" name="action" value="<?= $TPL['btnAction'] ?>"/>
                <input type="submit" value="<?= $TPL['btnLabel'] ?>" class="button"/>
            </div>
        </form>
    </div>

    <?php
    if ($TPL['addFeatures']) {
        ?>
        <div class="row">
            <div class="large-12 columns">
                <h3><?= $TPL["msg"]->getMsg('furniture_feature_list') ?></h3>
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                <span><?= $TPL['msg']->getMsg('furniture_feature_descDe') ?></span>
            </div>
            <div class="large-4 columns">
                <span><?= $TPL['msg']->getMsg('furniture_feature_descEn') ?></span>
            </div>
            <div class="large-3 columns pull-1">
                <span><?= $TPL['msg']->getMsg('furniture_feature_additionalPrice') ?></span>
            </div>
        </div>

        <?php
        $features = $TPL['features'];
        if (isset($features) || $features != null) {
            foreach ($features as $feature) {
                ?>
                <form method="POST">
                    <div class="row">
                        <div class="large-4 columns">
                            <textarea required="true" name="desc_de"><?= $feature->getNameDe() ?></textarea>
                        </div>
                        <div class="large-4 columns">
                            <textarea required="true" name="desc_en"><?= $feature->getNameEn() ?></textarea>
                        </div>
                        <div class="large-3 columns ">
                            <input name="additionalPrice" type="number"  value="<?= $feature->getExtraPrice() ?>"/>  </div>
                        <div class="large-1 columns">
                            <input type="hidden" name="furnitureId" value="<?= $f->getId(); ?>">
                            <input type="hidden" name="featureId" value="<?= $feature->getId(); ?>">
                            <input type="hidden" name="action" value="addNewFeature">
                            <input type="submit" name="submitNewFeature"
                                   value="<?= $TPL['msg']->getMsg('furniture_feature_btnLabel') ?>"/>
                        </div>
                    </div>
                </form>
            <?php
            } // end for
        } // end if

        ?>
        <div class="row">
            <div class="large-12 columns">
                <h3><?= $TPL["msg"]->getMsg('furniture_feature_add') ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="large-4 columns">
                <span><?= $TPL['msg']->getMsg('furniture_feature_descDe') ?></span>
            </div>
            <div class="large-4 columns">
                <span><?= $TPL['msg']->getMsg('furniture_feature_descEn') ?></span>
            </div>
            <div class="large-3 columns pull-1">
                <span><?= $TPL['msg']->getMsg('furniture_feature_additionalPrice') ?></span>
            </div>
        </div>

        <form method="POST">
            <div class="row">
                <div class="large-4 columns">
                    <textarea rows="30" cols="30" required="true" name="desc_de"></textarea>
                </div>
                <div class="large-4 columns">
                    <textarea rows="30" cols="30" required="true" name="desc_en"></textarea>

                </div>
                <div class="large-3 columns ">
                    <input name="additionalPrice" type="number"/>
                </div>
                <div class="large-1 columns">
                    <input type="hidden" name="furnitureId" value="<?= $f->getId(); ?>">
                    <input type="hidden" name="action" value="addNewFeature">
                    <input type="submit" name="submitNewFeature"
                           value="<?= $TPL['msg']->getMsg('furniture_feature_btnLabel') ?>"/>
                </div>
            </div>
        </form>


    <?php
    } // end if
    ?>


</div>