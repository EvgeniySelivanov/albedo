<?php

namespace App\Controllers;

session_start();
require_once 'App/Helpers/Messages.php';
require_once 'App/Helpers/uploadImage.php';

use App\Helpers\View;

use App\Models\Participant;

class ParticipantController extends Controller{

    public function index()
    {   $participants=Participant::all();
        View::render('participant',compact('participants'));
    }

    public function store()
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $birhtday=$_POST['birhtday'];
        $country=$_POST['country'];
        $phone=$_POST['phone'];
        $reportSubject=$_POST['reportSubject'];
        $email=$_POST['email'];
        $company=$_POST['company'];
        $position=$_POST['position'];
        $about=$_POST['about'];
        $filename=$_FILES['filename']['name'];
        $filename=uploadImage();
     

    $participant=new Participant();
    $participant->fname=$fname;
    $participant->lname=$lname;
    $participant->birhtday=$birhtday;
    $participant->country=$country;
    $participant->phone=$phone;
    $participant->reportSubject=$reportSubject;
    $participant->email=$email;
    $participant->company=$company;
    $participant->position=$position;
    $participant->about=$about;
    $participant->filename=$filename;




    /* uploadImage(); */
    
    $participant->save();
    return  self::redirect('/');
    }

  
}

