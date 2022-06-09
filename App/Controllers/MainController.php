<?php

namespace App\Controllers;

use App\Helpers\View;
use App\Models\Country;

class MainController
{
    public function index()
    {
        $countries = Country::all();

        View::render('main', compact('countries'));
    }
}
