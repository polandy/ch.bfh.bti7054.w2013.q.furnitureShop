<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">

        <h3>Create a furniture</h3>

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
                    <input type="text" name="name_de" required="true" pattern="\w{3,}*" value="deVal"/>
                </div>
            </div>
            <!-- Name EN -->
            <div class="row">
                <div class="large-4 columns">
                    <p>Furniture name en</p>
                </div>
                <div class="large-6 columns pull-2">
                    <input type="text" name="name_en" required="true" pattern="\w{3,}*" value="enVal"/>
                </div>
            </div>
            <!-- Price -->
            <div class="row">
                <div class="large-4 columns">
                    <p>Price</p>
                </div>
                <div class="large-6 columns pull-2">
                    <input type="text" name="price" required="true" pattern="[-+]?[0-9]*\.?[0-9]*" value="100.5"/>
                </div>
            </div>

            <!-- Description DE -->
            <div class="row">
                <div class="large-4 columns">
                    <p>Description de</p>
                </div>
                <div class="large-6 columns pull-2">
                    <textarea required="true" name="desc_de">fsdf</textarea>
                </div>
            </div>

            <!-- Description DE -->
            <div class="row">
                <div class="large-4 columns">
                    <p>Description en</p>
                </div>
                <div class="large-6 columns pull-2">
                    <textarea required="true" name="desc_en">fsdfsd</textarea>
                </div>
            </div>


            <div class="right pull-2">
                <input type="hidden" name="action" value="addFurniture" />
                <input type="submit" value="Add" class="button"/>
            </div>
        </form>
    </div>


</div>