<?php
namespace App\Controllers;
use App\Helpers\View;

class MainController{
    public function index()
    {
       View::render('main');
    }
   
}