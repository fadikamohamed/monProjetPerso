<?php

class MangaAuthor {

    private $pdo;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function getMangasAuthors()
    {
        $query = 'SELECT `id`, `name` FROM `gt1m_authors`';
        $mangasAuthors = $this->pdo->query($query);
        $result = $mangasAuthors->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
