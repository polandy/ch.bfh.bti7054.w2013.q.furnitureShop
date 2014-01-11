<?php

class Messages {
    private static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance))
            self::$instance = new Messages();
        return self::$instance;
    }

    public function getMessages() {
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
                        array("Fehlerhafte URL.", "Invalid URL.")
    );
}