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
        'edit' =>
        array('Bearbeiten', 'Edit'),
        'homepage' => array(
            "<h4>Zuhause sein?</h4>
            <h4>Sich wohl fühlen?</h4>
            <h4>Wir richten es ein!</h4>",
            "<h4>Be at home?</h4>
            <h4>Feel comfortable?</h4>
            <h4>We furnish it!</h4>"),
        "furniture_create" => array("Ein neues Möbel erstellen", "Create a new furniture"),
        "login_title"=>array("Name", "Name"),
        "login_name"=>array("Name", "Name"),
        "login_password"=>array("Passwort", "Password"),
        "login_failed"=>array("Benutzername und Password stimmen nich überein", "Username and password do not match"),
        "login_login"=>array("Login", "Login"),
    );
}