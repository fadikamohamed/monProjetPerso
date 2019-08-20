<?php

class Users {

    private $pdo;
    public $id;
    public $login;
    public $birthdate;
    public $mail;
    public $password;
    public $gender;
    public $idCountrys;
    public $avatarLink;
    public $research;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    /**
     * Méthode qui permet d'ajouter un utilisateur
     * @return boolean
     */
    public function addUser()
    {
        $query = 'INSERT INTO `gt1m_users`(`login`, `birthdate`, `mail`, `password`, `avatarLink`, `registrationDate`, `lastConnection`, `idGenders`, `idCountrys`, `idMembersRights`, `disabled`) '
                . 'VALUES (:login, :birthdate, :mail, :password, :avatarLink, CURDATE(), NOW(), :idGenders, :idCountrys, :idMembersRights, :disabled)';
        $addUser = $this->pdo->prepare($query);
        $addUser->bindValue(':login', $this->login, PDO::PARAM_STR);
        $addUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':avatarLink', 'assets/img/avatar.png', PDO::PARAM_STR);
        $addUser->bindValue(':idGenders', $this->gender, PDO::PARAM_INT);
        $addUser->bindValue(':idCountrys', $this->idCountrys, PDO::PARAM_INT);
        $addUser->bindValue(':idMembersRights', 3, PDO::PARAM_INT);
        $addUser->bindValue(':disabled', 1, PDO::PARAM_INT);
        $result = $addUser->execute();
        if ($result)
        {
            $addResult = true;
            var_dump($result);
        }
        else
        {
            $addResult = false;
            var_dump($result);
        }
        return $addResult;
    }

    /**
     * Méthode qui permet de modifier la date de derniere connexion
     * @return boolean
     */
    public function updateLastConnection()
    {
        $queryUpdate = 'UPDATE `gt1m_users` '
                . 'SET `lastConnection`=NOW() '
                . 'WHERE `id`=:id';
        $upLastCo = $this->pdo->prepare($queryUpdate);

        $queryGetNewDate = 'SELECT DATE_FORMAT(`lastConnection`, \'le %d %M %Y à %H h %i\') AS `lastConnection` FROM `gt1m_users` WHERE `id`=:id';
        $getNewDate = $this->pdo->prepare($queryGetNewDate);

        $getNewDate->bindValue(':id', $this->id, PDO::PARAM_INT);
        $upLastCo->bindValue(':id', $this->id, PDO::PARAM_INT);

        $this->pdo->beginTransaction();

        if ($upLastCo->execute())
        {
            $getNewDate->execute();
            $result = $getNewDate->fetch(PDO::FETCH_OBJ);
            if (is_object($result))
            {
                $this->pdo->commit();
            }
            else
            {
                $result = false;
                $this->pdo->rollback();
            }
        }
        else
        {
            $result = false;
            $this->pdo->rollback();
        }
        return $result;
    }

    /**
     * Méthode qui permet de vérifier si un pseudo existe dans la base de donnée
     * @return boolean
     */
    public function checkIfLoginExist()
    {
        $query = 'SELECT COUNT(`id`) AS `count` FROM `gt1m_users` WHERE `login`=:login';
        $checkLoginExist = $this->pdo->prepare($query);
        $checkLoginExist->bindValue(':login', $this->login, PDO::PARAM_STR);
        $checkLoginExist->execute();
        return $checkLoginExist->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode qui permet de vérifier si une adresse e-mail existe dans la base de donnée
     * @return boolean
     */
    public function checkIfMailExist()
    {
        $query = 'SELECT COUNT(`id`) AS `count` FROM `gt1m_users` WHERE `mail`=:mail';
        $checkMailExist = $this->pdo->prepare($query);
        $checkMailExist->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $checkMailExist->execute();
        return $checkMailExist->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode qui permet a un utilisateur de se connecter
     * @return string
     */
    public function connectionUser()
    {
        $query = 'SELECT `us`.`id`, `us`.`login`, '
                . 'DATE_FORMAT(`us`.`birthdate`, \'%d %M %Y\') '
                . 'AS `birthdate`, `us`.`mail`, `us`.`password`, `us`.`avatarLink`, '
                . 'DATE_FORMAT(`us`.`registrationDate`, \'%d %M %Y\') AS `registrationDate`, '
                . 'DATE_FORMAT(`us`.`lastConnection`, \'le %d %M %Y à %H h %i\') AS `lastConnection`, '
                . '`us`.`idGenders`, `us`.`idCountrys`, `us`.`idMembersRights`, `us`.`disabled`, '
                . '`cntry`.`country`, `gdrs`.`gender`, `mt`.`idMembersTeamRight` '
                . 'FROM `gt1m_users` AS `us` '
                . 'LEFT JOIN `gt1m_countrys` AS `cntry` ON `us`.`idCountrys`=`cntry`.`id` '
                . 'LEFT JOIN `gt1m_genders` AS `gdrs` ON `us`.`idGenders`=`gdrs`.`id` '
                . 'LEFT JOIN `gt1m_membersTeam` AS `mt` ON `us`.`id`=`mt`.`idUsers`'
                . 'WHERE `us`.`login`=:login';
        $connectUser = $this->pdo->prepare($query);
        $connectUser->bindValue(':login', $this->login, PDO::PARAM_STR);
        if ($connectUser->execute())
        {
            $connectUserResult = $connectUser->fetch(PDO::FETCH_OBJ);
        }
        else
        {
            $connectUserResult = false;
        }
        return $connectUserResult;
    }

    /**
     * Méthode qui permet de modifier le login
     * @return type
     */
    public function updateLogin()
    {
        $query = 'UPDATE `gt1m_users` '
                . 'SET `login`=:login '
                . 'WHERE `id`=:id';
        $updateLogin = $this->pdo->prepare($query);
        $updateLogin->bindValue(':login', $this->login, PDO::PARAM_STR);
        $updateLogin->bindValue(':id', $this->id, PDO::PARAM_STR);
        return $updateLogin->execute();
    }

    /**
     * Méthode qui permet de modifier la date de naissance
     * @return type
     */
    public function updateBirthdate()
    {
        $query = 'UPDATE `gt1m_users` '
                . 'SET `birthdate`=:birthdate '
                . 'WHERE `id`=:id';
        $updateBirthdate = $this->pdo->prepare($query);
        $updateBirthdate->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $updateBirthdate->bindValue(':id', $this->id, PDO::PARAM_STR);
        return $updateBirthdate->execute();
    }

    /**
     * Méthode qui permet de modifier le mail
     * @return type
     */
    public function updateMail()
    {
        $query = 'UPDATE `gt1m_users` '
                . 'SET `mail`=:mail '
                . 'WHERE `id`=:id';
        $updateMail = $this->pdo->prepare($query);
        $updateMail->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $updateMail->bindValue(':id', $this->id, PDO::PARAM_STR);
        return $updateMail->execute();
    }

    /**
     * Méthode qui permet de modifier le genre
     * @return type
     */
    public function updateGender()
    {
        $query = 'UPDATE `gt1m_users` '
                . 'SET `idGenders`=:gender '
                . 'WHERE `id`=:id';
        $updateGender = $this->pdo->prepare($query);
        $updateGender->bindValue(':gender', $this->gender, PDO::PARAM_STR);
        $updateGender->bindValue(':id', $this->id, PDO::PARAM_STR);
        return $updateGender->execute();
    }

    /**
     * Méthode qui permet de modifier le pays
     * @return type
     */
    public function updateCountry()
    {
        $query = 'UPDATE `gt1m_users` '
                . 'SET `idCountrys`=:idCountry '
                . 'WHERE `id`=:id';
        $updateCountry = $this->pdo->prepare($query);
        $updateCountry->bindValue(':idCountry', $this->idCountry, PDO::PARAM_STR);
        $updateCountry->bindValue(':id', $this->id, PDO::PARAM_STR);
        return $updateCountry->execute();
    }

    /**
     * Méthode qui permet de récupérer les information de l'utilisateur apres modification
     * @return type
     */
    public function getNewInfoById()
    {
        $query = 'SELECT `usrs`.`login`, DATE_FORMAT(`usrs`.`birthdate`, \'%d %M %Y\') as `birthdate`, `usrs`.`mail`, `gdrs`.`gender`, `cntrs`.`country` FROM `gt1m_users` AS `usrs` '
                . 'INNER JOIN `gt1m_genders` AS `gdrs` ON `usrs`.`idGenders` = `gdrs`.`id` '
                . 'INNER JOIN `gt1m_countrys` AS `cntrs` ON `usrs`.`idCountrys`=`cntrs`.`id` '
                . 'WHERE `usrs`.`id`=:id';
        $getInfo = $this->pdo->prepare($query);
        $getInfo->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($getInfo->execute())
        {
            return $getInfo->fetch(PDO::FETCH_OBJ);
        }
    }

    /**
     * Méthode qui permet de modifier l'avatar
     * @return type
     */
    public function updateAvatarLink()
    {
        $query = 'UPDATE `gt1m_users` '
                . 'SET `avatarLink`=:avatarLink '
                . 'WHERE `id`= :id';
        $uploadAvatarLink = $this->pdo->prepare($query);
        $uploadAvatarLink->bindValue(':avatarLink', $this->avatarLink, PDO::PARAM_STR);
        $uploadAvatarLink->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $uploadAvatarLink->execute();
    }

    /**
     * Méthode qui permet de supprimer un utilisateur
     * @return boolean
     */
    public function deleteUser()
    {
        $result = false;
        $query = 'UPDATE `gt1m_users` '
                . 'SET `disabled`= :disabled '
                . 'WHERE `id`=:id';
        $deleteUser = $this->pdo->prepare($query);
        $deleteUser->bindvalue(':disabled', 2, PDO::PARAM_INT);
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($deleteUser->execute())
        {
            $result = true;
        }
        return $result;
    }

    /**
     * Méthode qui permet de rechercher un membre
     * @return type
     */
    public function researchMembers()
    {
        $query = 'SELECT `id`, `login`, `avatarLink` '
                . 'FROM `gt1m_users`'
                . 'WHERE `login` LIKE :research ';
        $research = $this->pdo->prepare($query);
        $research->bindValue(':research', '%' . $this->research . '%', PDO::PARAM_STR);
        $research->execute();
        $result = $research->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;
        }
    }

    /**
     * Méthode qui permet de récupérer les membres d'une team
     * @return type
     */
    public function getMembresTeam()
    {
        $query = 'SELECT `usr`.`id`, `usr`.`login`, `usr`.`avatarLink`, DATE_FORMAT(`mbt`.`addingDate`, \'%d %M %Y\') as `addingDate`, `mtr`.`rank` '
                . 'FROM `gt1m_users` as `usr` '
                . 'INNER JOIN `gt1m_membersTeam` as `mbt` ON `mbt`.`idUsers`=`usr`.`id`'
                . 'INNER JOIN `gt1m_scantradTeams` as `sctt` ON `mbt`.`idScantradTeams`=`sctt`.`id` '
                . 'INNER JOIN `gt1m_membersTeamRight` as `mtr` ON `mtr`.`id`=`mbt`.`idMembersTeamRight` '
                . 'WHERE `mbt`.`idScantradTeams`=:idTeam';
        $getMembers = $this->pdo->prepare($query);
        $getMembers->bindValue(':idTeam', $this->idScantradTeams, PDO::PARAM_INT);
        $getMembers->execute();
        $result = $getMembers->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;
        }
    }

    /**
     * Méthode qui permet de réupérer le mot de passe crypté
     * @return type
     */
    public function verifPassword()
    {
        $query = 'SELECT `password` '
                . 'FROM `gt1m_users` '
                . 'WHERE `id`=:id';
        $verifPassword = $this->pdo->prepare($query);
        $verifPassword->bindValue(':id', $this->id, PDO::PARAM_INT);
        $verifPassword->execute();
        $result = $verifPassword->fetch(PDO::FETCH_OBJ);
        if (is_object($result))
        {
            return $result;
        }
    }

    /**
     * Méthode qui permet de modifier le mot de passe
     * @return boolean
     */
    public function updatePassword()
    {
        $result = false;
        $query = 'UPDATE `gt1m_users` '
                . 'SET `password`=:password '
                . 'WHERE `id`=:id';
        $updatePassword = $this->pdo->prepare($query);
        $updatePassword->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updatePassword->bindValue(':password', $this->password, PDO::PARAM_STR);
        if ($updatePassword->execute())
        {
            $result = true;
        }
        return $result;
    }

    public function __destruct()
    {
        $this->pdo = NULL;
    }

}
