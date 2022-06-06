<?php 
namespace App\Helpers;

class View{
    public static function render(string $view,array $data=[])
    {
        extract($data);
        unset($data);
        require_once 'App/views/header.php';
        require_once 'App/views/'.$view.'.php';
        require_once 'App/views/footer.php';



    }
}