<?php
global $tpl;

$msgService = \service\MsgService::getInstance();
$userService = \service\UserService::getInstance();
$config = Config::getInstance();

// User tries to login
if (isset($_POST["name"])) {
    $user = $userService->findUserByName($_POST["name"]);
    if (isset($user) && $user->password == sha1($_POST["password"])) {
        $_SESSION["user_id"] = $user->id;
        header("Location: ./index.php");
    } else {
        $tpl->assign("errorMsg", $msgService->getErrorMsg($msgService->getName("login_failed")));
        $_SESSION["user_id"] = null;
    }
}


$tpl->assign("firstname", isset($_POST["firstname"]) ? $_POST["firstname"] : "");
$tpl->assign("lastname", isset($_POST["lastname"]) ? $_POST["lastname"] : "");
$tpl->assign("male", isset($_POST["male"]) ? $_POST["male"] : "");
$tpl->assign("email", isset($_POST["email"]) ? $_POST["email"] : "");
$tpl->assign("username", isset($_POST["username"]) ? $_POST["username"] : "");
