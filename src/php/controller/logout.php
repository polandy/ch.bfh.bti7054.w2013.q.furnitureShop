<?php
/**
 * Controller for logout
 */
// remove the cookie and redirect to the startpage
$_SESSION["user_id"] = null;
header("Location: ./index.php");

