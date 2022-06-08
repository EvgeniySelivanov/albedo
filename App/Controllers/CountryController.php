<?php

namespace App\Controllers;


use App\Helpers\View;
use App\Models\Country;

class CountryController extends Controller{

    public function index()
    {
  $countries = Country::all();
        
        View::render('test', compact('countries')); 
    }
  
}