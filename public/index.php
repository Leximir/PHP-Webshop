<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class){
//  We added namespaces to a lot of classes and now we need to tweak this function to work properly
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); // This: Core\Database becomses : Core/Database, and continues to work properly
    
    require base_path("{$class}.php");
});

require base_path("Core/router.php");