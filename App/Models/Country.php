<?php
namespace App\Models;


class Country extends Model{
public $id;
public $countryName;




public static function getTable()
   {
/* return 'country'; */ /**true datebase */
return 'test'; /**test database */
   } 


}