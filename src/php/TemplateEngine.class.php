<?php

/**
 * Class TemplateEngine
 */
class TemplateEngine
{
    var $config;
    var $TEMPLATE_VARS = array();

    function __construct()
    {
        $this->config = Config::getInstance();
    }

    function assign($key, $val=null)
    {
        $this->TEMPLATE_VARS[$key] = $val;
    }

    function display($tpl_file)
    {
        if(!is_file($this->config->tplDir.$tpl_file.".tpl.php")) {
            exit('no such template file: '.$this->config->tplDir.$tpl_file.".tpl.php");
        }

        # Kurze Referenz auf die Template-Variable
        $TPL = &$this->TEMPLATE_VARS;

        $TPL["msg"] = \service\MsgService::getInstance();

        # Variabeln entpacken, damit $this weggelassen werden kann
        extract(get_object_vars($this));

        include($this->config->tplDir.$tpl_file.".tpl.php");
    }
}