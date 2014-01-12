<?php

class Messages
{
    private static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance))
            self::$instance = new Messages();
        return self::$instance;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @var map with all messages in all supported languages.
     * Supported languages at the moment: de, en
     * index 0 -> de
     * index 1 -> en
     */
    var $messages = array(
        'savedSuccess' =>
        array('Erfolgreich gespeichert!', 'Saved successfully'),
        'notAllAttributesSet' =>
        array('Nicht alle Attribute wurden entsprechend gesetzt.', 'Not all attributes has been set properly.'),
        'addToChart' =>
        array('In den Warenkörb', 'Add to Chart'),
        'invalidUrl' =>
        array("Fehlerhafte URL.", "Invalid URL."),
        'homepage' => array(
            "<h4>Zuhause sein?</h4>
            <h4>Sich wohl fühlen?</h4>
            <h4>Wir richten es ein!</h4>",
            "<h4>Be at home?</h4>
            <h4>Feel comfortable?</h4>
            <h4>We furnish it!</h4>"),
        "login_title" => array("Name", "Name"),
        "login_name" => array("Name", "Name"),
        "login_password" => array("Passwort", "Password"),
        "login_failed" => array("Benutzername und Password stimmen nich überein", "Username and password do not match"),
        "login_login" => array("Login", "Login"),
        "navi_logout" => array("Abmelden", "Logout"),
        "navi_loggedinAs" => array("Hallo ", "Hello "),
        "navi_register" => array("Registrieren", "Register"),
        "register_title" => array("Registrieren", "Register"),
        "register_firstname" => array("Vorname", "First name"),
        "register_lastname" => array("Nachname", "Last name"),
        "register_sex" => array("Geschlecht", "Sex"),
        "register_female" => array("Weiblein", "Female"),
        "register_male" => array("Männlein", "Male"),
        "register_email" => array("Email", "Email"),
        "register_username" => array("Benutzername", "Username"),
        "register_password" => array("Passwort", "Password"),
        "register_passwordVerify" => array("Passwort bestätigen", "Password verify"),
        "register_" => array("", ""),
    );
}