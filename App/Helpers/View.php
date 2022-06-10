<?php 
namespace App\Helpers;

class View{
    public static function render(string $view,array $data=[])
    {
        extract($data);
        unset($data);
        require_once 'App/Views/header.php';
        require_once 'App/Views/'.$view.'.php';
        require_once 'App/Views/footer.php';
    }
}