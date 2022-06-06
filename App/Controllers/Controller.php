<?php 
namespace App\Controllers;
abstract class Controller{
    public static function dump($arr)
    {
        echo '<pre>'. print_r($arr,true). '</pre>';
    }
    public static function redirect(string $path)
    {
        header('Location: '.$path);
        die();
    }

}