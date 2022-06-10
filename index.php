<?php
spl_autoload_register(function ($class) {
    //require_once "$class.php";
    require_once str_replace('\\','/',$class).'.php';

});
require_once "App/config.php";

use App\Exceptions\DbException;
use App\Exceptions\NotFoundException;
use App\Helpers\Router;
use App\Helpers\View;


try {
    Router::start();
} catch (DbException $e) {
    echo $e->getMessage();
} catch (NotFoundException $e) {
    View::render('errors/404', [], 404);
}