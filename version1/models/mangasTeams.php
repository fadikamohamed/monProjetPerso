<?php

class MangasTeams {

    private $pdo;
    public $idMangas;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    /**
     * Méthode qui permet de supprimer le lien entre un manga et une team
     * @return boolean
     */
    public function deleteMangaTeam()
    {
        $result = false;
        $query = 'DELETE FROM `gt1m_mangasTeams` '
                . 'WHERE `idMangas`=:idMangas';
        $deleteMangaTeam = $this->pdo->prepare($query);
        $deleteMangaTeam->bindValue(':idMangas', $this->idMangas, PDO::PARAM_INT);
        if ($deleteMangaTeam->execute())
        {
            $result = true;
        }
        return $result;
    }

}
