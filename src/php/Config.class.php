<?php
/**
 * Class Config
 * Configuration class for the webshop.
 * Important properties are set here.
 */
class Config
{

    # image directory. All Images are stored in this dir.
    public $webImgDir;
    # PHP directory. Usually all PHP Files are stored in this or a sub directory.
    public $webPhpDir;
    public $phpDir;
    public $viewDir;

    public $tplDir;
    public $funcDir;
    public $polDir;

    # The name of the database
    public $database;
    # The name of the database user
    public $database_user;
    # user passwort of the Database user
    public $database_pw;
    # database host
    public $database_host;

    # Email address for sending emails
    public $email;
    # Email address password
    public $email_pw;
    # chosen language for display
    public $language;
    # title of the website
    public $title;

    # singleton
    private static $instance;

    /**
     * The Constructor sets the config values
     */
    function __construct()
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

        # sender email
        $this->email = "mobius.furniturus@gmail.com";

        # sender email password
        $this->email_pw = 'Furnitinitystreet#8';


        # Title der Webseite
        $this->title = htmlentities("Möbius Furniturus - Online Shop");

        # Sprache
        if (isset($_GET["lang"]))
            $_SESSION["lang"] = $_GET["lang"];
        $this->language = isset($_SESSION["lang"]) ? $_SESSION["lang"] : "en";

        # Page Id's
        $this->pageIds = array(
            1 => "home",
            2 => "category",
            3 => "article",
            4 => 'impressum',
            5 => "showcart",
            6 => "confirmorder",
            100 => "admin/category",
            200 => "admin/furniture",
            403 => "accessDenied",
            404 => "404",
            97 => "register",
            98 => "logout",
            99 => "login");

        $this->database = "db_furnitureshop";
        $this->database_host = "localhost";
        $this->database_user = "root";
        $this->database_pw = "";

        $this->user = null;
    }

    /**
     * Returns the currently logged in user
     */
    public function getUser()
    {
        if (!isset($this->user) && isset($_SESSION["user_id"])) {
            $this->user = \service\UserService::getInstance()->findUserById($_SESSION["user_id"]);
        }
        return $this->user;
    }

    public function isAdmin()
    {
        $user = $this->getUser();
        if (!isset($user))
            return false;
        return \service\RoleService::getInstance()->findRoleById($user->roleId)->name == "admin";
    }

    public function getPageIdByValue($val)
    {
        return (array_search($val, $this->pageIds));
    }

    public static function getInstance()
    {
        if (is_null(self::$instance))
            self::$instance = new Config();
        return self::$instance;
    }

}
