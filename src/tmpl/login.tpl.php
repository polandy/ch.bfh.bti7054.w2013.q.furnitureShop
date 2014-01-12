<div class="row">
    <!-- Main Content Section -->
    <div class="large-9 columns">

        <h3><?=$TPL["msgLogin"]?></h3>

        <form method="POST">
            <div class="row">
                <div class="large-3 columns">
                    <p><?=$TPL["msgName"]?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="text" name="name" required="true"/>
                </div>
            </div>
            <div class="row">
                <div class="large-3 columns">
                    <p>Name en<?=$TPL["msgPw"]?></p>
                </div>
                <div class="large-6 columns pull-3">
                    <input type="password" name="password" required="true"/>
                </div>
            </div>
            <div class="right pull-3">
                <input type="hidden" name="action" value="addCategory" />
                <input type="submit" value="Add" class="button"/>
            </div>
        </form>
    </div>


</div>