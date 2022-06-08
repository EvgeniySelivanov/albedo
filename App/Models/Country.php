<?php
namespace App\Models;


class Country extends Model{
public $id;
public $countryName;
/* public $countryCode; */



public static function getTable()
   {
/* return 'country'; */
return 'test';
   } 


}