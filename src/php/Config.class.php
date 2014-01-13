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
    # PHP directory as it is accessible from the filesystem
    public $phpDir;
    # Controller directory as it is accessible from the filesystem
    public $controllerDir;

    # Template directory as it is accessible from the filesystem
    public $tplDir;

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
        $this->webImgDir = "images/";

        # The php template directory
        $this->tplDir = realpath("./tmpl") . "/";

        $this->controllerDir = realpath("./php/controller") . "/";

        # sender email (username for SMTP login)
        $this->email = "mobius.furniturus@gmail.com";

        # sender email password (password for SMTP login)
        $this->email_pw = 'Furnitinitystreet#8';

        # SMTP host to send emails
        $this->smtp = 'smtp.gmail.com';

        # SMTP port to send emails
        $this->smtp_port = 465;

        # Title der Webseite
        $this->title = htmlentities("Möbius Furniturus - Online Shop");

        # DB Name
        $this->database = "db_furnitureshop";

        # DB Host
        $this->database_host = "localhost";

        # DB User
        $this->database_user = "root";

        # DB password
        $this->database_pw = "";


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
            7 => "confirmedorder",
            97 => "register",
            98 => "logout",
            99 => "login",
            100 => "admin/category",
            200 => "admin/furniture",
            403 => "403",
            404 => "404");


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
