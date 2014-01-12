<?php
global $tpl;

$user = Config::getInstance()->getUser();
$tpl->assign("loggedin", $user != null);

if($user != null){
    $tpl->assign("name", $user->firstName." ".$user->lastName);
}

