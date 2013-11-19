<div class="row">
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="large-9 columns">

        <h3>Category Admin</h3>

        <form method="POST">
            <div class="row">
                <div class="large-3 columns">
                    <p>Name de</p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="name_de" required="true" pattern="\w{3,}"/>
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <p>Name en</p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="name_en" required="true" pattern="\w{3,}"/>
                </div>
            </div>
            <div class="right pull-3">
                <input type="hidden" name="action" value="addCategory" />
                <input type="submit" value="Add" class="button"/>
            </div>
        </form>
    </div>


</div>