<?php
spl_autoload_register(function ($class) {
    require_once "$class.php";
});
require_once "App/config.php";

App\Helpers\Router::start();
