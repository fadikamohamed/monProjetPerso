<?php

class Chapters {

    private $pdo;
    public $id;
    public $chapter;
    public $locationLink;
    public $idMangas;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    /**
     * Méthode qui permet d'ajouter un chapitre
     * @return boolean
     */
    public function addChapter()
    {
        $result = false;
        $query = 'INSERT INTO `gt1m_chapters`(`chapter`, `locationLink`, `addingDate`, `idMangas`) '
                . 'VALUES(:chapter, :locationLink, NOW(), :idMangas)';
        $addChapter = $this->pdo->prepare($query);
        $addChapter->bindValue(':chapter', $this->chapter, PDO::PARAM_STR);
        $addChapter->bindValue(':locationLink', $this->locationLink, PDO::PARAM_STR);
        $addChapter->bindValue(':idMangas', $this->idMangas, PDO::PARAM_INT);
        if ($addChapter->execute())
        {
            $result = true;
        }
        return $result;
    }

    /**
     * Méthode qui permet de récupérer la list des chapitres
     * @return type
     */
    public function getListChapters()
    {
        $query = 'SELECT `id`, `chapter`, `locationLink`, `addingDate` '
                . 'FROM `gt1m_chapters` '
                . 'WHERE `idMangas`=:idMangas AND `disabled`=:disabled';
        $getList = $this->pdo->prepare($query);
        $getList->bindValue(':idMangas', $this->idMangas, PDO::PARAM_INT);
        $getList->bindValue(':disabled', 1, PDO::PARAM_INT);
        $getList->execute();
        return $getList->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLastChapters()
    {
        $result = array();
        $query = 'SELECT `m`.`title`, `c`.`id`, `c`.`chapter` '
                . 'FROM `gt1m_chapters` AS `c` '
                . 'INNER JOIN `gt1m_mangas` `m` '
                . 'ON `c`.`idMangas`=`m`.`id` '
                . 'WHERE `c`.`disabled`=1';
        $getChapters = $this->pdo->query($query);
        $result = $getChapters->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;
        }
    }

    /**
     * Méthode qui permet de régupérer les informations d'un chapitre par son id
     * @return type
     */
    public function getChapterById()
    {

        $query = 'SELECT `c`.`id`, `c`.`chapter`, `c`.`locationLink`, `c`.`idMangas`, `m`.`title` '
                . 'FROM `gt1m_chapters` AS `c` '
                . 'INNER JOIN `gt1m_mangas` AS `m` '
                . 'ON `c`.`idMangas`=`m`.`id` '
                . 'WHERE `c`.`id`=:id AND `c`.`disabled`=:disabled';
        $getChapter = $this->pdo->prepare($query);
        $getChapter->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getChapter->bindValue(':disabled', 1, PDO::PARAM_INT);
        $getChapter->execute();
        $getChapterResult = $getChapter->fetch(PDO::FETCH_OBJ);
        if (is_object($getChapterResult))
        {
            return $getChapterResult;
        }
    }

    /**
     * Méthode qui permet de supprimer les chapitres d'un manga
     * @return boolean
     */
    /*public function deleteChapters()
    {
        $result = false;
        $query = 'UPDATE `gt1m_chapters` '
                . 'SET `disabled`=:disabled '
                . 'WHERE `idMangas`=:idMangas AND `chapter`=:chapter';
        $deleteManga = $this->pdo->prepare($query);
        $deleteManga->bindValue(':disabled', 2, PDO::PARAM_INT);
        $deleteManga->bindValue(':chapter', $this->chapter, PDO::PARAM_STR);
        $deleteManga->bindValue(':idMangas', $this->idMangas, PDO::PARAM_INT);
        if ($deleteManga->execute())
        {
            $result = true;
        }
        return $result;
    }*/


    /**
     * Méthode qui permet de supprimer les chapitres d'un manga
     * @return boolean
     */
    public function deleteChapters()
    {
        $result = false;
        $query = 'DELETE FROM `gt1m_chapters` '
                . 'WHERE `idMangas`=:idMangas AND `chapter`=:chapter';
        $deleteManga = $this->pdo->prepare($query);
        $deleteManga->bindValue(':chapter', $this->chapter, PDO::PARAM_STR);
        $deleteManga->bindValue(':idMangas', $this->idMangas, PDO::PARAM_INT);
        if ($deleteManga->execute())
        {
            $result = true;
        }
        return $result;
    }

    public function __destruct()
    {
        
    }

}
