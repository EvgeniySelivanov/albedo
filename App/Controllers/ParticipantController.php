<?php

namespace App\Controllers;


require_once 'App/Helpers/Messages.php';
require_once 'App/Helpers/uploadImage.php';



use App\Helpers\View;

use App\Models\Participant;

class ParticipantController extends Controller
{

    public function index()
    {
        $participants = Participant::all();
        View::render('participant', compact('participants'));
    }


    public function storeStep1()
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $birhtday = $_POST['birhtday'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $reportSubject = $_POST['reportSubject'];
        $email = $_POST['email'];

        $participant = new Participant();
        $participant->fname = $fname;
        $participant->lname = $lname;
        $participant->birhtday = $birhtday;
        $participant->country = $country;
        $participant->phone = $phone;
        $participant->reportSubject = $reportSubject;
        $participant->email = $email;

        $participant->save();
        $newParticipant = Participant::findBy('email', $email);
        echo  $newParticipant ? $newParticipant->id : null;
    }

    public function storeStep2()
    {
        $company = $_POST['company'] ?? null;
        $position = $_POST['position'] ?? null;
        $about = $_POST['about'] ?? null;
        $filename = uploadImage();

        $participant = Participant::find($_POST['id']);
        $participant->company = $company;
        $participant->position = $position;
        $participant->about = $about;
        $participant->filename = $filename;

        $participant->save();
    }

    public function issetParticipant()
    {
        $email = $_POST['email'];
        echo Participant::findBy('email', $email) ? true : false;
    }
    function show($id){
        echo $id;
    }
}
