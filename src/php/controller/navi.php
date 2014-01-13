<?php
/**
 * Controller of navi
 */

// Import TemplateEngine Object
global $tpl;

// display users name if he is logged in
$user = Config::getInstance()->getUser();
$tpl->assign("loggedin", $user != null);

if($user != null){
    $tpl->assign("name", $user->firstName." ".$user->lastName);
}