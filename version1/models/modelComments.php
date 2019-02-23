<?php

class Comments {

    private $pdo;
    public $idMangas;
    public $idUser;
    public $idScantradTeam;
    public $idChapter;
    public $comment;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    /**
     * Méthode qui permet d'ajouter un commentaire a un manga
     * @return boolean
     */
    public function addMangaComment()
    {
        $query = 'INSERT INTO `gt1m_comments`(`comment`, `addingDate`, `idMangas`, `idUsers`) '
                . 'VALUES(:comment, NOW(), :idManga, :idUser)';
        $addComment = $this->pdo->prepare($query);
        $addComment->bindValue(':comment', $this->comment, PDO::PARAM_STR);
        $addComment->bindValue(':idManga', $this->idMangas, PDO::PARAM_INT);
        $addComment->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        if ($addComment->execute())
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    /**
     * Méthode qui permet de récupérer les commentaires d'un manga
     * @return type
     */
    public function getMangaComments()
    {
        $query = 'SELECT `cmt`.`id`, `cmt`.`comment`, DATE_FORMAT(`cmt`.`addingDate`, \'Le %d %M %Y à %hh%i\') as `date`, `usr`.`id` as `userId`, `usr`.`login`, `usr`.`avatarLink` '
                . 'FROM `gt1m_comments` as `cmt` '
                . 'INNER JOIN `gt1m_users` as `usr` '
                . 'ON `cmt`.`idUsers`=`usr`.`id` '
                . 'WHERE `cmt`.`idMangas`=:idManga '
                . 'ORDER BY `date` DESC';
        $getComments = $this->pdo->prepare($query);
        $getComments->bindValue(':idManga', $this->idMangas, PDO::PARAM_INT);
        $getComments->execute();
        $result = $getComments->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;
        }
    }
    
    /**
     * Méthode qui permet de supprimer les commentaires d'un manga
     * @return boolean
     */
    public function deleteMangaComments()
    {
        $result = false;
        $query = 'DELETE FROM `gt1m_comments` '
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
