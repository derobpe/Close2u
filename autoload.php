<?php
spl_autoload_register(function ($class) {

    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)) {
        require_once $file;
    }
    throw new Exception("The class '$class' could not be loaded.");

});