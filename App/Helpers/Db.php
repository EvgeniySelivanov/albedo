<?php
namespace App\Helpers;
class Db{
    public $pdo;
    public function __construct()
    {
        require_once 'app/config.php';
        $this->pdo=new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    }


    public function query(string $sql,array $params=[],$class='stdClass'){

        $pr=$this->pdo->prepare($sql);
        $pr->execute($params);
        return $pr->fetchAll(\PDO:: FETCH_CLASS,$class);

    }
}