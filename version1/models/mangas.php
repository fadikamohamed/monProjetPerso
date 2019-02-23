<?php

class Mangas {

    private $pdo;
    public $id;
    public $title;
    public $author;
    public $synopsis;
    public $pictureLink;
    public $creationDate;
    public $addingDate;
    public $idMangaTypes;
    public $idCategory;
    public $idPublicationStatus;
    public $idKinds;
    public $idMangas;
    public $idScantradTeams;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

//    public function addManga($numbersOfKinds)
//    {
////Requete permetant d'ajouter un manga avec titre, synopsis, image d'illustration, date de création de la serie, date d'ajout sur le site, l'id du type, l'id de la categorie et l'id du status
//        $queryAddManga = 'INSERT INTO `gt1m_mangas`(`title`, `synopsis`, `pictureLink`, `creationDate`, `addingDate`, `idMangaTypes`, `idCategory`, `idPublicationStatus`) '
//                . 'VALUES(:title, :synopsis, :pictureLink, :creationDate, CURDATE(), :idMangaTypes, :idCategory, :idPublicationStatus)';
//        $addManga = $this->pdo->prepare($queryAddManga);
//
//        $queryMangaTeam = 'INSERT INTO `gt1m_mangasTeams`(`idScantradTeams`, `idMangas`) VALUES(:idScantradTeams, :idMangas)';
//        $mangaTeam = $this->pdo->prepare($queryMangaTeam);
//
//        try {
////Début de la transaction
//            $this->pdo->begintransaction();
//
//            $addManga->bindValue(':title', $this->title, PDO::PARAM_STR);
//            $addManga->bindValue(':synopsis', $this->synopsis, PDO::PARAM_STR);
//            $addManga->bindValue(':pictureLink', 'assets/img/MangaBanner.jpg', PDO::PARAM_STR);
//            $addManga->bindValue(':creationDate', $this->creationDate, PDO::PARAM_STR);
//            $addManga->bindValue(':idMangaTypes', $this->idMangaTypes, PDO::PARAM_INT);
//            $addManga->bindValue(':idCategory', $this->idCategory, PDO::PARAM_INT);
//            $addManga->bindValue(':idPublicationStatus', $this->idPublicationStatus, PDO::PARAM_INT);
//            $addManga->execute();
//
//            $queryIdManga = 'SELECT `id` FROM `gt1m_mangas` WHERE `title`=:title';
//            $idManga = $this->pdo->prepare($queryIdManga);
//            $idManga->bindValue(':title', $this->title, PDO::PARAM_STR);
//            $idManga->execute();
//            $idMangaResult = $idManga->fetch(PDO::FETCH_OBJ);
//
//            $mangaTeam->bindValue(':idScantradTeams', $this->idScantradTeams, PDO::PARAM_INT);
//            $mangaTeam->bindValue(':idMangas', $idMangaResult->id, PDO::PARAM_INT);
//
//            $mangaTeam->execute();
//
//            foreach ($this->idKinds as $idKind)
//            {
//                $queryAddMangasKinds = 'INSERT INTO `gt1m_mangasKinds`(`idKinds`, `idMangas`) VALUES(:idKinds, :idMangas)';
//                $addMangasKinds = $this->pdo->prepare($queryAddMangasKinds);
//                $addMangasKinds->bindValue(':idKinds', $idKind, PDO::PARAM_INT);
//                $addMangasKinds->bindValue(':idMangas', $idMangaResult->id, PDO::PARAM_INT);
//                $addMangasKinds->execute();
//            }
//            $queryAddIdAuthor = 'INSERT INTO `gt1m_mangasAuthors`(`idAuthors`, `idMangas`) VALUES(:idAuthor, :idManga)';
//            $addIdAuthor = $this->pdo->prepare($queryAddIdAuthor);
//            $addIdAuthor->bindValue(':idAuthor', $this->author, PDO::PARAM_INT);
//            $addIdAuthor->bindValue(':idManga', $idMangaResult->id, PDO::PARAM_INT);
//            $addIdAuthor->execute();
//        } catch (PDOException $e) {
//            $e = $this->pdo->rollback();
//        }
//        $this->pdo->commit();
//    }

    /**
     * Méthode permetant d'ajouter un manga
     * @param type $numbersOfKinds
     * @return boolean
     */
    public function addManga($numbersOfKinds)
    {
//Requete permetant d'ajouter un manga avec titre, synopsis, image d'illustration, date de création de la serie, date d'ajout sur le site, l'id du type, l'id de la categorie et l'id du status
        $queryAddManga = 'INSERT INTO `gt1m_mangas`(`title`, `synopsis`, `pictureLink`, `creationDate`, `addingDate`, `idMangaTypes`, `idCategory`, `idPublicationStatus`) '
                . 'VALUES(:title, :synopsis, :pictureLink, :creationDate, NOW(), :idMangaTypes, :idCategory, :idPublicationStatus)';
        $addManga = $this->pdo->prepare($queryAddManga);

        $queryMangaTeam = 'INSERT INTO `gt1m_mangasTeams`(`idScantradTeams`, `idMangas`) VALUES(:idScantradTeams, :idMangas)';
        $mangaTeam = $this->pdo->prepare($queryMangaTeam);


//Début de la transaction
        $this->pdo->begintransaction();

        $addManga->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addManga->bindValue(':synopsis', $this->synopsis, PDO::PARAM_STR);
        $addManga->bindValue(':pictureLink', 'assets/img/MangaBanner.jpg', PDO::PARAM_STR);
        $addManga->bindValue(':creationDate', $this->creationDate, PDO::PARAM_STR);
        $addManga->bindValue(':idMangaTypes', $this->idMangaTypes, PDO::PARAM_INT);
        $addManga->bindValue(':idCategory', $this->idCategory, PDO::PARAM_INT);
        $addManga->bindValue(':idPublicationStatus', $this->idPublicationStatus, PDO::PARAM_INT);


//Si l'ajout de la serie s'est bien éffectué
        if ($addManga->execute())
        {   //Requete permettant de récupérer l'id de la serie créé précédemment 
            $queryIdManga = 'SELECT `id` FROM `gt1m_mangas` WHERE `title`=:title';
            $idManga = $this->pdo->prepare($queryIdManga);
            $idManga->bindValue(':title', $this->title, PDO::PARAM_STR);
            $idManga->execute();
            $idMangaResult = $idManga->fetch(PDO::FETCH_OBJ);
//Si on obtiens une valeur
            if (is_object($idMangaResult))
            {
                $mangaTeam->bindValue(':idScantradTeams', $this->idScantradTeams, PDO::PARAM_INT);
                $mangaTeam->bindValue(':idMangas', $idMangaResult->id, PDO::PARAM_INT);
                if ($mangaTeam->execute())
                {
//Si le nombre de genres envoyé dans le formulaire est supérieur a 0
                    if ($numbersOfKinds > 0)
                    {  //On éffectue une boucle avec les valeurs du tableau recupéré dans $this->idKinds
                        foreach ($this->idKinds as $idKind)
                        {
                            $queryAddMangasKinds = 'INSERT INTO `gt1m_mangasKinds`(`idKinds`, `idMangas`) VALUES(:idKinds, :idMangas)';
                            $addMangasKinds = $this->pdo->prepare($queryAddMangasKinds);
                            $addMangasKinds->bindValue(':idKinds', $idKind, PDO::PARAM_INT);
                            $addMangasKinds->bindValue(':idMangas', $idMangaResult->id, PDO::PARAM_INT);
                            if ($addMangasKinds->execute())
                            {
                                $addKindResult = true;
                            }
                            else
                            {
                                $addKindResult = false;
                            }
                        }
                        if ($addKindResult)
                        {
                            $queryAddIdAuthor = 'INSERT INTO `gt1m_mangasAuthors`(`idAuthors`, `idMangas`) VALUES(:idAuthor, :idMangas)';
                            $addIdAuthor = $this->pdo->prepare($queryAddIdAuthor);
                            $addIdAuthor->bindValue(':idAuthor', $this->author, PDO::PARAM_INT);
                            $addIdAuthor->bindValue(':idMangas', $idMangaResult->id, PDO::PARAM_INT);
                            if ($addIdAuthor->execute())
                            {
                                $transactionResult = true;
                                $this->pdo->commit();
                            }
                            else
                            {
                                $transactionResult = false;
                                $this->pdo->rollback();
                            }
                        }
                        else
                        {
                            $transactionResult = false;
                            $this->pdo->rollback();
                        }
                    }
                    else
                    {
                        $transactionResult = false;
                        $this->pdo->rollback();
                    }
                }
            }
            else
            {
                $transactionResult = false;
                $this->pdo->rollback();
            }
        }
        else
        {
            $transactionResult = false;
            $this->pdo->rollback();
        }
        return $transactionResult;
    }

    /**
     * Méthode qui permet de récupérer les differents catégories de mangas
     * @return type
     */
    public function mangasCategory()
    {
        $query = 'SELECT `id`, `category` FROM `gt1m_category`';
        $mangasAuthors = $this->pdo->query($query);
        $result = $mangasAuthors->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * Méthode qui permet de récupérer les differents types de mangas
     * @return type
     */
    public function mangasTypes()
    {
        $query = 'SELECT `id`, `types` FROM `gt1m_mangaTypes`';
        $mangasTypes = $this->pdo->query($query);
        $result = $mangasTypes->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * Méthode qui permet de récupérer les differents status de mangas
     * @return type
     */
    public function mangasStatus()
    {
        $query = 'SELECT `id`, `status` FROM `gt1m_publicationStatus`';
        $mangasStatus = $this->pdo->query($query);
        $result = $mangasStatus->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * Méthode qui permet de récupérer la liste des mangas
     * @return type
     */
    public function getMangasList()
    {
        $query = 'SELECT `m`.`id` as `id`, `m`.`title` as `title`, `m`.`synopsis` as `synopsis`, `m`.`pictureLink` as `pictureLink`, `mt`.`types` as `type`, `ctgr`.`category` as `category`, `ps`.`status` as `status`, `sctt`.`teams` as `team`, `sctt`.`id` as `idTeam` '
                . 'FROM `gt1m_mangas` AS `m` '
                . 'INNER JOIN `gt1m_mangaTypes` AS `mt` ON `m`.`idMangaTypes`=`mt`.`id` '
                . 'INNER JOIN `gt1m_category` AS `ctgr` ON `m`.`idCategory`=`ctgr`.`id` '
                . 'INNER JOIN `gt1m_publicationStatus` AS `ps` ON `m`.`idPublicationStatus`=`ps`.`id` '
                . 'INNER JOIN `gt1m_mangasTeams` AS `mts` ON `m`.`id`=`mts`.`idMangas` '
                . 'INNER JOIN `gt1m_scantradTeams` AS `sctt` ON `mts`.`idScantradTeams`=`sctt`.`id`';
        $getMangaList = $this->pdo->query($query);
        $result = $getMangaList->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * Méthode qui permet de récupérer les info d'un manga
     * @return boolean
     */
    public function getMangaInfoById()
    {
        $query = 'SELECT `m`.`id`, `m`.`title`, `m`.`synopsis`, `m`.`pictureLink`, `m`.`creationDate`, `m`.`addingDate`, '
                . '`mt`.`types`, `ctgr`.`category`, `ps`.`status`, `sctt`.`teams`, `mts`.`idScantradTeams`, `aths`.`name` '
                . 'FROM `gt1m_mangas` AS `m` '
                . 'INNER JOIN `gt1m_mangaTypes` AS `mt` ON `m`.`idMangaTypes`=`mt`.`id` '
                . 'INNER JOIN `gt1m_category` AS `ctgr` ON `m`.`idCategory`=`ctgr`.`id` '
                . 'INNER JOIN `gt1m_publicationStatus` AS `ps` ON `m`.`idPublicationStatus`=`ps`.`id` '
                . 'INNER JOIN `gt1m_mangasAuthors` AS `maths` ON `maths`.`idMangas`=`m`.`id` '
                . 'INNER JOIN `gt1m_authors` AS `aths` ON `maths`.`idAuthors`=`aths`.`id` '
                . 'INNER JOIN `gt1m_mangasTeams` AS `mts` ON `mts`.`idMangas`=`m`.`id` '
                . 'INNER JOIN `gt1m_scantradTeams` AS `sctt` ON `mts`.`idScantradTeams`=`sctt`.`id` '
                . 'WHERE `m`.`id`=:idManga';
        $getMangaById = $this->pdo->prepare($query);
        $getMangaById->bindValue(':idManga', $this->idMangas, PDO::PARAM_INT);
        if ($getMangaById->execute())
        {
            $result = $getMangaById->fetch(PDO::FETCH_OBJ);
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    /**
     * Méthode qui permet de récupérer les mangas d'une team
     * @return boolean
     */
    public function getMangaByTeamId()
    {
        $query = 'SELECT `m`.`id`, `m`.`title`, `ctgr`.`category`, `psts`.`status`, `tps`.`types` FROM `gt1m_mangas` AS `m` '
                . 'INNER JOIN `gt1m_mangasTeams` AS `mt` ON `mt`.`idMangas`=`m`.`id` '
                . 'INNER JOIN `gt1m_category` AS `ctgr` ON `m`.`idCategory`=`ctgr`.`id` '
                . 'INNER JOIN `gt1m_mangaTypes` AS `tps` ON `m`.`idMangaTypes`=`tps`.`id` '
                . 'INNER JOIN `gt1m_publicationStatus` AS `psts` ON `m`.`idPublicationStatus`=`psts`.`id` '
                . 'WHERE `mt`.`idScantradTeams`=:idScantradTeams';
        $getByTeamId = $this->pdo->prepare($query);
        $getByTeamId->bindValue(':idScantradTeams', $this->idScantradTeams, PDO::PARAM_INT);
        if ($getByTeamId->execute())
        {
            $result = $getByTeamId->fetchAll(PDO::FETCH_OBJ);
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    /**
     * Méthode qui permet de récupérer les differents genres de mangas
     * @return boolean
     */
    public function getMangasKinds()
    {
        $query = 'SELECT `k`.`kind` FROM `gt1m_kinds` AS `k` '
                . 'INNER JOIN `gt1m_mangasKinds` AS `mk` ON `mk`.`idKinds`=`k`.`id` '
                . 'WHERE `mk`.`idMangas`=:idMangas';
        $getKinds = $this->pdo->prepare($query);
        $getKinds->bindValue(':idMangas', $this->idMangas, PDO::PARAM_INT);
        if ($getKinds->execute())
        {
            $result = $getKinds->fetchAll(PDO::FETCH_OBJ);
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    /**
     * Méthode qui permet de vérifier l'existence d'un manga
     * @return boolean
     */
    public function verifMangaExist()
    {
        $result = false;
        $query = 'SELECT `title` FROM `gt1m_mangas` AS `m` '
                . 'INNER JOIN `gt1m_mangasTeams` AS `mt` '
                . 'ON `mt`.`idMangas`=`m`.`id` '
                . ' WHERE `m`.`title`=:title AND `mt`.`idScantradTeams`=:idScantradTeams';
        $verifMangaExist = $this->pdo->prepare($query);
        $verifMangaExist->bindValue(':title', $this->title, PDO::PARAM_STR);
        $verifMangaExist->bindValue(':idScantradTeams', $this->idScantradTeams, PDO::PARAM_INT);
        $verifMangaExist->execute();
        $verifResult = $verifMangaExist->fetch(PDO::FETCH_OBJ);
        if (is_object($verifResult))
        {
            $result = true;
        }
        return $result;
    }

    /**
     * Méthode qui permet de supprimer un manga
     * @return boolean
     */
    public function deleteManga()
    {
        $result = false;
        $query = 'DELETE FROM `gt1m_mangas` '
                . 'WHERE `id`=:idMangas';
        $deleteManga = $this->pdo->prepare($query);
        $deleteManga->bindValue(':idMangas', $this->idMangas, PDO::PARAM_INT);
        if ($deleteManga->execute())
        {
            $result = true;
        }
        return $result;
    }

}
