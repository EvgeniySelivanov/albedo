<?php 
namespace App\Helpers;

class View{
    public static function render(string $view)
    {
        require_once 'App/views/header.php';
        require_once 'App/views/'.$view.'.php';
        require_once 'App/views/footer.php';



    }
}