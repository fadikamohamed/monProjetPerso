<?php

class MangaStatus {

    private $pdo;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function getMangasStatus()
    {
        $query = 'SELECT `id`, `status` FROM `gt1m_publicationStatus`';
        $mangasStatus = $this->pdo->query($query);
        $result = $mangasStatus->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}
