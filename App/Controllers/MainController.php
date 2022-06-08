<?php
namespace App\Controllers;
use App\Helpers\View;




class MainController{


    public function index()
    {
       /*  $countries = Country::all(); */
        
        View::render('main');
    }
   
}