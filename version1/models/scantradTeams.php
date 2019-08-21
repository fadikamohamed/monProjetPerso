<?php

class ScantradTeams {

    private $pdo;
    public $id;
    public $teams;
    public $idUsers;
    public $idScantradTeams;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function addScantradTeam()
    {
        $addTeamQuery = 'INSERT INTO `gt1m_scantradTeams`(`teams`, `bannerLink`, `idUsers`, `createdByUserId`, `addingDate`) '
                . 'VALUES (:teams, :bannerLink, :idUsers, :createdByUserId, CURDATE())';
        $addTeam = $this->pdo->prepare($addTeamQuery);
        $addTeam->bindValue(':teams', $this->teams, PDO::PARAM_STR);
        $addTeam->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $addTeam->bindValue(':bannerLink', 'assets/img/avatar.png', PDO::PARAM_STR);
        $addTeam->bindValue(':createdByUserId', $this->idUsers, PDO::PARAM_INT);

        $getInfoQuery = 'SELECT `id` FROM `gt1m_scantradTeams` '
                . 'WHERE `teams`=:teams';
        $getInfos = $this->pdo->prepare($getInfoQuery);

        $addMemberTeamQuery = 'INSERT INTO `gt1m_membersTeam`(`addingDate`, `idUsers`, `idScantradTeams`, `idMembersTeamRight`) '
                . 'VALUES (CURDATE(), :idUsers, :idScantradTeams, :idMembersTeamRight)';
        $addMemberTeam = $this->pdo->prepare($addMemberTeamQuery);

//        try {
        $this->pdo->beginTransaction();
        if ($addTeam->execute())
        {
            $getInfos->bindValue(':teams', $this->teams, PDO::PARAM_STR);
            if ($getInfos->execute())
            {
                $infoTeam = $getInfos->fetch(PDO::FETCH_OBJ);
                $idTeam = $infoTeam->id;

                $addMemberTeam->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
                $addMemberTeam->bindValue(':idScantradTeams', $idTeam, PDO::PARAM_INT);
                $addMemberTeam->bindValue(':idMembersTeamRight', 1, PDO::PARAM_INT);
                if ($addMemberTeam->execute())
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
//        } catch (\PDOException $e) {
//            echo 'Error : ' . $e->getMessage() . '<br />';
//            echo 'N° : ' . $e->getCode();
//            exit();
//            $transactionResult = false;
//        }
        return $transactionResult;
    }

    public function verifScantradTeamExist()
    {
        $query = 'SELECT `teams` FROM `gt1m_scantradTeams` WHERE `teams`=:teams';
        $ifExist = $this->pdo->prepare($query);
        $ifExist->bindValue(':teams', $this->teams, PDO::PARAM_STR);
        $ifExist->execute();
        $result = $ifExist->fetch(PDO::FETCH_OBJ);
        if (is_object($result))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    public function getListTeams()
    {
        $query = 'SELECT '
                . '`sctt`.`id` AS `id`, '
                . '`sctt`.`teams` AS `teams`, '
                . '`usr`.`login` AS `login` '
                . 'FROM `gt1m_scantradTeams` '
                . 'AS `sctt` '
                . 'INNER JOIN `gt1m_users` '
                . 'AS `usr` '
                . 'ON `sctt`.`createdByUserId`=`usr`.`id`';
        $listTeams = $this->pdo->query($query);
        $result = $listTeams->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getTeamById()
    {
        $result = false;
        $query = 'SELECT `teams`, `createdByUserId` FROM `gt1m_scantradTeams` WHERE `id`=:id';
        $getTeam = $this->pdo->prepare($query);
        $getTeam->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($getTeam->execute())
        {
            $result = $getTeam->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
    
    public function getUserTeamRight(){
        $query = 'SELECT `idMembersTeamRight` '
                . 'FROM `gt1m_membersTeam` '
                . 'WHERE `idUsers`=:idUsers AND `idScantradTeams`=:idScantradTeams';
        $getUserTeamRight = $this->pdo->prepare($query);
        $getUserTeamRight->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $getUserTeamRight->bindValue(':idScantradTeams', $this->id, PDO::PARAM_INT);
        $getUserTeamRight->execute();
        $result = $getUserTeamRight->fetch(PDO::FETCH_OBJ);
        if (is_object($result))
        {
            return $result;
        }
    }
    

    public function getTeamsByUserId()
    {
        $result = false;
        $query = 'SELECT `id`, `teams`, DATE_FORMAT(`addingDate`, \'Le %d %M %Y\') AS `addingDate`'
                . 'FROM `gt1m_scantradTeams` '
                . 'WHERE `createdByUserId`=:id';
        $teamsByUser = $this->pdo->prepare($query);
        $teamsByUser->bindValue(':id', $this->idUsers, PDO::PARAM_INT);
        if ($teamsByUser->execute())
        {
            $result = $teamsByUser->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function __destruct()
    {
        $this->pdo = NULL;
    }

}
