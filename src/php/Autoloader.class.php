<?php

/**
 * Class Autoloader
 */
class Autoloader {

    /**
     * Init and register autoloader
     */
    public function __construct() {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Autoloading method
     * @param string $class
     */
    public function loadClass($class) {
        require __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, "$class.class.php");
    }
}