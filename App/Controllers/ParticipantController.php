<?php

namespace App\Controllers;



require_once 'App/Helpers/uploadImage.php';
/* require_once 'App/Helpers/validateMail.php'; */


use App\Helpers\View;

use App\Models\Participant;

class ParticipantController extends Controller
{

    public function index()
    {
        $participants = Participant::all();
        View::render('participant', compact('participants'));
    }


    public function store()
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $birhtday = $_POST['birhtday'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $reportSubject = $_POST['reportSubject'];
        $email = $_POST['email'];
        $company = $_POST['company'] ?? null;
        $position = $_POST['position'] ?? null;
        $about = $_POST['about'] ?? null;
        $filename = $_FILES['filename']['error'] != 4 ? uploadImage() : null;

        $id = $_POST['id'];

        if (!$id && $this->issetParticipant($email)) {
            echo json_encode(['error' => 'User Exists']);
            die();
        }

        $participant = $id ? Participant::find($id) : new Participant();
        $participant->fname = $fname;
        $participant->lname = $lname;
        $participant->birhtday = $birhtday;
        $participant->country = $country;
        $participant->phone = $phone;
        $participant->reportSubject = $reportSubject;
        $participant->email = $email;


        $participant->company = $company;
        $participant->position = $position;
        $participant->about = $about;
        $participant->filename = $filename;

        $participant->save();
        $newParticipant = Participant::findBy('email', $email);
        // $newParticipant ? $newParticipant->id : null;
        echo  json_encode(['id' => $newParticipant->id]);
    }

    public function issetParticipant($email)
    {
        // $email = $_POST['email'];
        return Participant::findBy('email', $email) ? true : false;
    }

    function show($id)
    {
        $participant = Participant::find($id);
        View::render('participant-show', compact('participant'));
    }
}
