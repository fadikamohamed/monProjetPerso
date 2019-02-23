<?php

class MangasAuthors {

    private $pdo;
    public $idMangas;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    /**
     * Méthode qui permet de supprimé le lien entre un manga et un auteur
     * @return boolean
     */
    public function deleteMangaAuthor()
    {
        $result = false;
        $query = 'DELETE FROM `gt1m_mangasAuthors` '
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
