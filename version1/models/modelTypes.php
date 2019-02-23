<?php

class MangaTypes {

    private $pdo;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function getMangasTypes()
    {
        $query = 'SELECT `id`, `types` FROM `gt1m_mangaTypes`';
        $mangasTypes = $this->pdo->query($query);
        $result = $mangasTypes->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
