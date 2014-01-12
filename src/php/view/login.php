<?php
global $tpl;

$msgService = \service\MsgService::getInstance();
$userService = \service\UserService::getInstance();


// User tries to login
if (isset($_POST["name"])) {
    $user = $userService->findUserById($_POST["name"]);
    if (isset($user) && $user->password == sha1($_POST["password"])) {
        $_SESSION["user_id"] = $user->id;
    } else {
        $tpl->assign("errorMsg", $msgService->getErrorMsg($msgService->getName("login_failed")));
        $_SESSION["user_id"] = null;
    }
}
$tpl->assign("username", isset($_POST["name"]) ? $_POST["name"] : "");


