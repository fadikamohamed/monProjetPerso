<?php

class MangaKinds {

    private $pdo;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function getMangasKinds()
    {
        $query = 'SELECT `id`, `kind` FROM `gt1m_kinds`';
        $mangasKinds = $this->pdo->query($query);
        $result = $mangasKinds->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
