<?php

class Countrys {

    private $pdo;
    public $id;
    public $country;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }
    
    public function getListCountrys(){
        $getListCountrys = $this->pdo->query('SELECT `id`, `country` FROM `gt1m_countrys`');
        $getListCountrysResult = $getListCountrys->fetchAll(PDO::FETCH_OBJ);
        return $getListCountrysResult;
    }
    
    public function __destruct()
    {
        
    }

}
