<?php

class MangasLiked {

    private $pdo;
    public $idUser;
    public $idManga;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function addMangaLiked()
    {
        $result = false;
        $query = 'INSERT INTO `gt1m_likedMangas`(`idUsers`, `idMangas`) '
                . 'VALUES(:idUser, :idManga)';
        $addMangaLiked = $this->pdo->prepare($query);
        $addMangaLiked->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $addMangaLiked->bindValue(':idManga', $this->idManga, PDO::PARAM_INT);
        if ($addMangaLiked->execute())
        {
            $result = true;
        }
        return $result;
    }

    public function removeMangaLiked()
    {
        $result = false;
        $query = 'DELETE FROM `gt1m_likedMangas` WHERE `idUsers`=:idUser AND `idMangas`=:idManga';
        $removeMangaLiked = $this->pdo->prepare($query);
        $removeMangaLiked->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $removeMangaLiked->bindValue(':idManga', $this->idManga, PDO::PARAM_INT);
        if ($removeMangaLiked->execute())
        {
            $result = true;
        }
        return $result;
    }

    public function ifMangaIsLiked()
    {
        $result = false;
        $query = 'SELECT `idUsers`, `idMangas` FROM `gt1m_likedMangas` WHERE `idUsers`=:idUser AND `idMangas`=:idManga';
        $ifMangaIsLiked = $this->pdo->prepare($query);
        $ifMangaIsLiked->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $ifMangaIsLiked->bindValue(':idManga', $this->idManga, PDO::PARAM_INT);
        $ifMangaIsLiked->execute();
        $ifLikedResult = $ifMangaIsLiked->fetch(PDO::FETCH_OBJ);
        if (is_object($ifLikedResult))
        {
            $result = $ifLikedResult;
        }
        return $result;
    }

    public function getMangaLikedList()
    {
        $query = 'SELECT `lm`.`id`, `lm`.`idUsers`, `lm`.`idMangas`, `m`.`title` FROM `gt1m_likedMangas` AS `lm` '
                . 'INNER JOIN `gt1m_mangas` AS `m` '
                . 'ON `lm`.`idMangas`=`m`.`id` '
                . 'WHERE `idUsers`=:idUser';
        $getMangasLiked = $this->pdo->prepare($query);
        $getMangasLiked->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $getMangasLiked->execute();
        $result = $getMangasLiked->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
