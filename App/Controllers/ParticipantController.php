<?php
namespace App\Controllers;
use App\Helpers\View;
class ParticipantController{
    public function participant()
    {
        View::render('participant');
    }
}