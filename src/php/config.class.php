<?php

class config
{
    
    var $rootDir;
    var $webRootDir;
    var $webCssDir;
    var $webImgDir;
    var $webPhpDir;
    var $phpDir;
    var $tplDir;
    var $funcDir;
    var $polDir;

    var $database;
    var $database_user;
    var $database_pw;
    var $database_host;
    var $oracLink;

    var $lang;
    var $charset;
    var $title;
    var $analytics;

    function config()
    {
        # The web-css directory
        $this->webStylesDir = "styles/";

        # The web-img directory
        $this->webImgDir = "img/";

        # The web-php directory
        $this->webPhpDir = "php/";

        # The php template directory
        $this->tplDir = realpath("./tmpl") . "/";

        # The php directory
        $this->phpDir = realpath("./php") . "/";

        # The name of the database
        $this->database = "db_furnitureShop";

        # The database user
        $this->database_user = "db_furnitureShop";

        # The database password
        $this->database_pw = "db_furnitureShop";

        # Charset der Webseite
        $this->charset = "UTF-8";

        # Title der Webseite
        $this->title = "Furniture Shop - ";

        # Page Id's
        $this->pageIds = array(1 => "home");

        # Datenbank verbinden
        $this->connectDatabase();

    }

    # Verbindung zur Datenbank
    function connectDatabase()
    {
    }


}
