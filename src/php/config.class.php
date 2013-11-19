<?php
class config
{

    public $rootDir;
    public $webRootDir;
    public $webCssDir;
    public $webImgDir;
    public $webPhpDir;
    public $phpDir;
    public $viewDir;

    public $tplDir;
    public $funcDir;
    public $polDir;
    public $database;
    public $database_user;
    public $database_pw;
    public $database_host;
    public $oracLink;
    public $lang;
    public $charset;
    public $title;
    public $analytics;

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

        $this->viewDir = realpath("./php/view") . "/";

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
        $this->pageIds = array(1 => "home",
            2 => "category");

        # Datenbank verbinden
        $this->connectDatabase();

    }

    # Verbindung zur Datenbank
    function connectDatabase()
    {
    }


}
