<?php
require_once("config.class.php");

class TemplateEngine
{
    var $config;
    var $TEMPLATE_VARS = array();

    function TemplateEngine()
    {
        $this->config = new config();
    }

    function getconfig()
    {
        $this->config = new config();
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

        # Variabeln entpacken, damit $this weggelassen werden kann
        extract(get_object_vars($this));

        include($this->config->tplDir.$tpl_file.".tpl.php");
    }
}