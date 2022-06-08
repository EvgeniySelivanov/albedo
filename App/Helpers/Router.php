<?php

namespace App\Helpers;

// use App\Exceptions\NotFoundException;
use App\Views;

class Router
{
    private static $page;

    public static function start()
    {
        self::$page = $_GET['url'] ?? '/';     //article/1
        $routes = require __DIR__ . '/../web.php';

        $isRouteFound = false; // $routes нет совпадений по url
        foreach ($routes as $pattern => $controllerAndMethod) {
            preg_match('~^' . $pattern . '$~', self::$page, $matches);
            if (!empty($matches)) {
                $isRouteFound = true;
                break;
            }
        }

        if ($isRouteFound) {   //  
            list($nameMethod, $nameController) = $controllerAndMethod;
            if (file_exists('App/controllers/' . $nameController . '.php')) {
                $pathController = 'App\\Controllers\\' . $nameController;
                $controller = new $pathController();
                if (method_exists($controller, $nameMethod)) {
                    unset($matches[0]);

                    $controller->$nameMethod(...$matches);
                } else {
                    echo 'Method not found';
                }
            } else {
                echo 'File not found';
            }
        } else {
            // throw new NotFoundException();
        }
    }


    public static function getPage()
    {
        return self::$page;
    }
}
