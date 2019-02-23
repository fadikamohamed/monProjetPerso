<?php

class MangaCategory {

    private $pdo;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function getMangasCategory()
    {
        $query = 'SELECT `id`, `category` FROM `gt1m_category`';
        $mangasCategory = $this->pdo->query($query);
        $result = $mangasCategory->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
