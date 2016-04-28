<?php

$dirs = array(
    "",
    "Model/",
);

spl_autoload_register(function ($class) use ($dirs) {
    foreach ($dirs as $dir) {
        $path = 'src/' . $dir . str_replace("\\", '/', $class) . '.php';
        if (file_exists($path)) {
            require_once $path;
        }
    }
});
