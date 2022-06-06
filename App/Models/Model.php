<?php
namespace App\Models;

use App\Helpers\Db;
use ReflectionClass;

abstract class Model
{
protected static $db;

public function __construct()
{
    self::$db=new Db();
}

abstract public static function getTable();

public static function all(){
     self::$db=new Db();
     $result= self::$db->query('SELECT * FROM ' .static::getTable(),[],static::class);
     return $result;
 }
 
 public static function find($id){
     self::$db=new Db();
     $result= self::$db->query('SELECT * FROM '. static::getTable() .' WHERE id=?',[$id],static::class);
     return $result ? $result[0]:null;
 }

 public function save(){
 $properties=$this->getProperties();
if(!$this->id){
    array_splice($properties ,array_search('id',$properties),1);
}

 $placeholders=array_map(function($p){return':'.$p;},$properties);
 $parameters=[];
 $paramsUpdate=[];


 foreach($properties as $p){
 $parameters[$p]=$this->$p;
 $paramsUpdate[]=$p . '=:' . $p;
 }
    if(!$this->id)
    {
    $sql='INSERT INTO ' . static::getTable() . '('   .join(', ',$properties).     ') VALUES('  .join(', ',$placeholders).     ')';
    }

    else{
    $sql='UPDATE '. static::getTable() . ' SET '.  join(', ',$paramsUpdate). ' WHERE id=:id';
    }

    self::$db=new Db();
    self::$db->query($sql,$parameters);
}

public function deleteCategory(){
    
    if($this->id)
    $id=$_POST['id'];

    $sql='DELETE FROM `'. static::getTable() .'` WHERE id='.$id.'';

    self::$db=new Db();
    self::$db->query($sql); 
}


 protected function getProperties(){
 
     $reflection =new ReflectionClass(static::class);
     $properties=$reflection->getProperties();
     
     $propertiesClass=[];
     foreach($properties as $property){
     if($property->name!='db')
     $propertiesClass[]=$property->name;
     }
 
     return $propertiesClass;
 }

}