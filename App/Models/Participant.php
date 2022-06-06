<?php
namespace App\Models;


class Participant extends Model{
public $id;
public $fname;
public $lname;
public $birhtday;
public $country;
public $phone;
public $reportSubject;
public $email;
public $company;
public $position;
public $about;
public $filename;


public static function getTable()
   {
return 'participants';
   } 


}
