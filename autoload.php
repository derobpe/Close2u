<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once $file;
    } else {
        error_log("Autoload: The class '$class' could not be loaded. File '$file' not found.");
        throw new Exception("The class '$class' could not be loaded.");
    }
});