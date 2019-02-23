<?php

class MangasDeleted {

    private $pdo;
    public $idMangas;
    public $idTeams;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    /**
     * Méthode qui permet de stocker un manga supprimé dans une table spéciale
     * @return boolean
     */
    public function addMangaDeleted()
    {
        $result = false;
        $query = 'INSERT INTO `gt1m_mangasDeleted`(`title`, `idManga`, `idTeam`) '
                . 'VALUES(:title, :idManga, :idTeam)';
        $deleteMangaTeam = $this->pdo->prepare($query);
        $deleteMangaTeam->bindValue(':title', $this->title, PDO::PARAM_STR);
        $deleteMangaTeam->bindValue(':idManga', $this->idMangas, PDO::PARAM_INT);
        $deleteMangaTeam->bindValue(':idTeam', $this->idTeams, PDO::PARAM_INT);
        if ($deleteMangaTeam->execute())
        {
            $result = true;
        }
        return $result;
    }

}
