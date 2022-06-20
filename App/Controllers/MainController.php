<?php

namespace App\Controllers;

use App\Helpers\View;
use App\Models\Country;
use DateTime;

class MainController
{
    public function index()
    {
        $countries = Country::all();

        View::render('main', compact('countries'));
    }


    public function dateBirthday(){
        $date=['hello'];
      
         View::render('main',compact('date'));
         
    }


}
