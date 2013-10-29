<?php
session_start();

require_once("php/config.class.php");
require_once("php/template_engine.class.php");


$config = new config();
$tpl = new TemplateEngine();


$tpl->display("header");

$pageId = $_GET["pageId"];
if(isset($pageId))
{
    $pageName = $config->pageIds[$pageId];
    if(!isset($pageName) || !is_file($config->phpDir.$pageName.".php"))
    {
        $tpl->display("error");
    }
    else{
        if(include($config->phpDir.$pageName).".php") $tpl->display($pageName);	# Only show the template when the inclusion was ok (access...)
    }
}
else
{
    if(include($config->phpDir."home").".php") $tpl->display("home");	# Only show the template when the inclusion was ok (access...)
}

$tpl->display("footer");