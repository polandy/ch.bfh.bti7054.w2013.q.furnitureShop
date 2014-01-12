<?php
global $tpl;

$msgService = \service\MsgService::getInstance();
$userService = \service\UserService::getInstance();
$config = Config::getInstance();

if ($config->getUser() != null)
    header("Location: ./index.php");

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
$tpl->assign("username", isset($_POST["name"]) ? $_POST["name"] : "");


