<?php
//Si auccune session n'est lancé 
if (!session_id())
{ //Appeler le fichier de configuration
    require_once '../configuration.php';
}
//Déclarer la fonction profilUser()
function profilUser()
{   //Déclarer l'instance $profilModify de la class Users()
    $profilModify = new Users();
    //Si $_POST['avatarSubmit'] existe
    if (isset($_POST['avatarSubmit']))
    {   //Si $_FILES['avatarProfil'] n'est pas vide
        if (!empty($_FILES['avatarProfil']))
        {   //Intégrer le chemin du dossier dans la variable $directory
            $directory = 'assets/img/avatars/' . $_SESSION['id'];
            //Si $directory n'est pas un dossier
            if (!is_dir($directory))
            {   //Créer le dossier
                mkdir($directory);
            }
            //Ajouter un '/' a la fin du chemin
            $avatarDirectory = $directory . '/';
            //Ajouter le nom du fichier
            $avatarFile = $avatarDirectory . $_FILES['avatarProfil']['name'];
            //Enregistrer le fichier telecharger dans le dossier spécifié et intégrer la réponse dans la variable $avatarModify
            $avatarModify = move_uploaded_file($_FILES['avatarProfil']['tmp_name'], $avatarFile);
            //Si la réponse est égale a true
            if ($avatarModify == true)
            {   //Intégrer le chemin de destination dans la variable de session $_SESSION['avatar']
                $_SESSION['avatar'] = $avatarFile;
                //Hydrater l'attribut id de l'instance $profilModify avec la valeure de la variable de session $_SESSION['id']
                $profilModify->id = $_SESSION['id'];
                //Hydrater l'attribut avatarLink de l'instance $profilModify avec la valeure de la variable $avatarFile
                $profilModify->avatarLink = $avatarFile;
                //Intégrer le résultat de la méthode updateAvatarLink() de l'instance $profilModify dans la variable $newAvatar
                $newAvatar = $profilModify->updateAvatarLink();
                //Intégrer un message dans le $formSuccess
                $formSuccess['file'] = 'Votre avatar a bien était modifié !';
            }
            //Sinon si est égale a false
            elseif ($avatarModify == false)
            {  //Intégrer un message dans le $formSuccess
                $formError['file'] = 'Le téléchargement du fichier a échoué !';
            }
        }
        else
        {  //Intégrer un message dans le $formSuccess
            $formError['file'] = 'Il n\'y a pas de fichier';
        }
    }
    //Pour obtenir la liste des pays
    //On déclare l'instance $country de la class Countrys
    $country = new Countrys();
    //Et on interger la réponse dans la variable $countryListe
    $countryListe = $country->getListCountrys();
    
    
    //Si $_POST['deleteUserSubmit'] existe 
    if (isset($_POST['deleteUserSubmit']))
    {   //Si $_POST['passwordForDelete'] n'est pas vide
        if (!empty($_POST['passwordForDelete']))
        {   //Désactiver les balise dans $_POST['passwordForDelete'] et l'inclure dans $password
            $password = htmlspecialchars($_POST['passwordForDelete']);
            //Hydrater l'attribut login de l'insatance $profilModify avec la valeur de $_SESSION['login']
            $profilModify->login = $_SESSION['login'];
            //Récupérer la réponse de la méthode connectionUser() dans la variable $profilInfo
            $profilInfo = $profilModify->connectionUser();
            //Si $profilInfo est un objet
            if (is_object($profilInfo))
            {   
                if($profilInfo->idMembersTeamRight != 1)
                {                    
                    //comparer le mot de passe reçu dans $password avec et celui reçu dans $profilInfo et intégrer le résultat dans $passwordVerif
                    $passwordVerif = password_verify($password, $profilInfo->password);
                    //Si ils sont identiques donc que la variable $passwordVerif est égale a un 
                    if ($passwordVerif == 1)
                    {   //Hydrater l'attribut id de l'instance $profilModify avec la valeur de $_SESSION['id']
                        $profilModify->id = $_SESSION['id'];
                        //Si la réponse de la méthode deleteUser() est égale a true
                        if ($profilModify->deleteUser())
                        {   
                            $_SESSION['isConnected'] = false;
                            //Rediriger vers le fichier de déconnexion
                            header('Location: disconnection.html');
                        }//Sinon
                        else
                        {   //Intégrer un message d'erreur dans $formError
                            $formStatus['deleteProfil'] = 'La suppréssion a échoué !';
                        }
                    }
                    else
                    {
                        $formError['deleteProfil'] = 'Mauvais mot de passe !';
                    }                    
                }else{
                    $formError['deleteProfil'] = 'Vous ne pouvez pas suprimer votre compte tant que vous etes Leader d\'une équipe !';
                }
            }
            else
            {
                $formError['deleteProfil'] = 'Mauvais mot de passe !';
            }
        }
        else
        {
            $formError['deleteProfil'] = 'Vous devez entrer un mot de passe !';
        }
    }
    //Intégrer le chemin du dossier dans une variable $avatarSource
    $avatarSource = 'assets/img/avatars/' . $_SESSION['id'] . '/';
    //Appeler le fichier de la vue
    require 'views/profilUser.php';
}
//--------------------------------------------------------------------------------------------------------------------------------------------------
//Si $_POST['profilModifSubmit'] existe
if (isset($_POST['profilModifSubmit']))
{   //Déclarer le tableau $formError
    $formError = array();
    //Déclaration de l'instance $updateProfil de la class Users()
    $updateProfil = new Users();
    //Si $_POST['login'] n'est pas vide
    if (!empty($_POST['login']))
    {   //Si $_POST['login'] passe la régex
        if (preg_match($loginRegex, $_POST['login']))
        {   //Désactiver les balise dans $_POST['login'] et l'inclure dans l'attribut login de l'instance $updateProfil
            $updateProfil->login = htmlspecialchars($_POST['login']);
        }
        else
        {   //Intégrer un message d'erreur dans $formError
            echo $formError['login'] = 'Votre login n\'a pas pu être modifié !';
            //On renvoi un message a AJAX avec echo
            echo '<p class="check error">Votre login n\'a pas pu être modifié !</p>';
        }
    }
    //Si $_POST['birthdate'] n'est pas vide
    if (!empty($_POST['birthdate']))
    {   //Si $_POST['birthdate'] passe la régex
        if (preg_match($dateRegex, $_POST['birthdate']))
        {   //Désactiver les balise dans $_POST['birthdate'] et l'inclure dans l'attribut birthdate de l'instance $updateProfil
            $updateProfil->birthdate = htmlspecialchars($_POST['birthdate']);
        }
        else
        {
            $formError['birthdate'] = 'Votre date de naissance n\'a pas pu être modifié !';
        }
    }
    //Si $_POST['mail'] n'est pas vide 
    if (!empty($_POST['mail']))
    {   //Si $_POST['mail'] passe la régex
        if (preg_match($mailRegex, $_POST['mail']))
        {   //Désactiver les balise dans $_POST['mail'] et l'inclure dans l'attribut mail de l'instance $updateProfil
            $updateProfil->mail = htmlspecialchars($_POST['mail']);
        }
        else
        {
            $formError['mail'] = 'Votre mail n\'a pas pu être modifié !';
        }
    }
    //Si $_POST['gender'] n'est pas vide 
    if (!empty($_POST['gender']))
    {   //Si $_POST['mail'] passe la régex
        if (preg_match($genderRegex, $_POST['gender']))
        {   //Désactiver les balise dans $_POST['gender'] et l'inclure dans l'attribut gender de l'instance $updateProfil
            $updateProfil->gender = htmlspecialchars($_POST['gender']);
        }
        else
        {
            $formError['gender'] = 'Votre gender n\'a pas pu être modifié !';
        }
    }
    //Si $_POST['country'] n'est pas vide 
    if (!empty($_POST['country']))
    {   //Si $_POST['country'] passe la régex
        if (preg_match($countrysRegex, $_POST['country']))
        {   //Désactiver les balise dans $_POST['country'] et l'inclure dans l'attribut country de l'instance $updateProfil
            $updateProfil->idCountry = htmlspecialchars($_POST['country']);
        }
        else
        {
            $formError['country'] = 'Votre pays n\'a pas pu être modifié !';
        }
    }
    if (count($formError) == 0)
    {
        $updateProfil->id = $_SESSION['id'];
        //Si l'attribut login de l'instance $updateProfil n'est pas vide 
        if (!empty($updateProfil->login))
        {   //Si le résultat de la méthode updateLogin() de l'instance $updateProfil n'est pas égale a true 
            if (!$updateProfil->updateLogin())
            {
                echo '<p class="check error">Votre login n\'a pas pu être modifié !</p>';
            }
            else
            {
                echo '<p class="check success">Votre login a été changé avec succes</p>';
            }
        }
        //Si l'attribut birthdate de l'instance $updateProfil n'est pas vide
        if (!empty($updateProfil->birthdate))
        {   //Si le résultat de la méthode updateBirthdate() de l'instance $updateProfil n'est pas égale a true 
            if (!$updateProfil->updateBirthdate())
            {
                echo '<p class="check error">Votre date de naissance n\'a pas pu être modifié !</p>';
            }
            else
            {
                echo '<p class="check success">Votre date de naissance a été modifié avec succes</p>';
            }
        }
        //Si l'attribut mail de l'instance $updateProfil n'est pas vide
        if (!empty($updateProfil->mail))
        {   //Si le résultat de la méthode updateMail() de l'instance $updateProfil n'est pas égale a true 
            if (!$updateProfil->updateMail())
            {
                echo '<p class="check error">Votre mail n\'a pas pu être modifié !</p>';
            }
            else
            {
                echo '<p class="check success">Le mail a été modifié avec succes</p>';
            }
        }//Si l'attribut gender de l'instance $updateProfil n'est pas vide
        if (!empty($updateProfil->gender))
        {   //Si le résultat de la méthode updateGender() de l'instance $updateProfil n'est pas égale a true 
            if (!$updateProfil->updateGender())
            {
                echo '<p class="check error">Votre gender n\'a pas pu être modifié !</p>';
            }
            else
            {
                echo '<p class="check success">Felicitation vous venez de changer de sexe ;)</p>';
            }
        }//Si l'attribut idCountry de l'instance $updateProfil n'est pas vide
        if (!empty($updateProfil->idCountry))
        {   //Si le résultat de la méthode updateCountry() de l'instance $updateProfil n'est pas égale a true 
            if (!$updateProfil->updateCountry())
            {
                echo '<p class="check error">Votre pays n\'a pas pu être modifié !</p>';
            }
            else
            {
                echo '<p class="check success">Le pays a été modifié avec succes</p>';
            }
        }
        //Intégration du résultat de la méthode getNewInfoById() dans la variable $newInfo
        $newInfo = $updateProfil->getNewInfoById();
        //Intégration de la valeure de l'attribut login dans la variable de session $_SESSION['login']
        $_SESSION['login'] = $newInfo->login;
        //Intégration de la valeure de l'attribut birthdate dans la variable de session $_SESSION['birthdate']
        $_SESSION['birthdate'] = $newInfo->birthdate;
        //Intégration de la valeure de l'attribut mail dans la variable de session $_SESSION['mail']
        $_SESSION['mail'] = $newInfo->mail;
        //Intégration de la valeure de l'attribut gender dans la variable de session $_SESSION['gender']
        $_SESSION['gender'] = $newInfo->gender;
        //Intégration de la valeure de l'attribut country dans la variable de session $_SESSION['country']
        $_SESSION['country'] = $newInfo->country;
    }
    else
    {
        echo '<p class="check error">La modification n\'a pu avoir lieu car :</p>'
        . '<?php foreach($formError as $msg) {'
            . '<p class="error"><?= $msg ?></p>'
            . '}'
            . '<p>Pseudo : <?= $_SESSION[\'login\'] ?></p>'
            . '<p>Né le : <?= $_SESSION[\'birthdate\'] ?></p>'
            . '<p>Né le : <?= $_SESSION[\'mail\'] ?></p>'
            . '<p>E-mail : <?= $_SESSION[\'gender\'] ?></p>'
            . '<p>E-mail : <?= $_SESSION[\'country\'] ?></p>';
        }
    }
    
    //Si $_POST['password'] n'est pas vide 
    if (isset($_POST['password']))
    {   //Déclaration du tableau $formError
        $formError = array();
        //Si $_POST['password'] n'est pas vide 
        if (!empty($_POST['password']))
        {   //Si $_POST['password'] passe la régex
            if (preg_match($passwordRegex, $_POST['password']))
            {   //Désactiver les balise dans $_POST['password'] et l'inclure dans la variable $password
                $password = htmlspecialchars($_POST['password']);
            }
            else
            {   
                $formError['password'] = 'Le mot de passe n\'est pas conforme';
            }
        }
        else
        {
            $formError['password'] = 'Vous devez entrer un mot de passe';
        }
        
        //Si $_POST['newPassword'] n'est pas vide 
        if (!empty($_POST['newPassword']))
        {   //Si $_POST['newPassword'] passe la régex
            if (preg_match($passwordRegex, $_POST['newPassword']))
            {   //Désactiver les balise dans $_POST['newPassword'] et l'inclure dans la variable $newPassword
                $newPassword = htmlspecialchars($_POST['newPassword']);
                //Si $_POST['newPasswordConfirm'] n'est pas vide 
                if (!empty($_POST['newPasswordConfirm']))
                {   //Si $_POST['newPasswordConfirm'] passe la régex
                    if (preg_match($passwordRegex, $_POST['newPasswordConfirm']))
                    {   //Désactiver les balise dans $_POST['newPasswordConfirm'] et l'inclure dans la variable $newPasswordConfirm
                        $newPasswordConfirm = htmlspecialchars($_POST['newPasswordConfirm']);
                        //Si les deux mot de passe ne sont pas identiques
                        if ($newPassword !== $newPasswordConfirm)
                        {   
                            $formError['newPasswordConfirm'] = 'Les deux mots de passe doivent être identiques';
                            echo 'Les deux mots de passe doivent être identiques';
                        }
                    }
                    else
                    {
                        $formError['newPasswordConfirm'] = 'Le mot de passe de confirmation n\'est pas conforme';
                    }
                }
                else
                {
                    $formError['newPasswordConfirm'] = 'Vous devez entrer un mot de passe de confirmation';
                }
            }
            else
            {
                $formError['newPassword'] = 'Le mot de passe n\'est pas conforme';
            }
        }
        else
        {
            $formError['newPassword'] = 'Vous devez entrer un mot de passe';
        }
        
        //Si $formError est vide 
        if (count($formError) == 0)
        {   //Déclarer l'instance $updatePassword de la class Users()
            $updatePassword = NEW Users();
            //Intégration de la valeur de $_SESSION['id'] dans l'attribut id de l'instance $updatePassword
            $updatePassword->id = $_SESSION['id'];
            //Intégration du résultat de la méthode verifPassword() dans $lastPassword
            $lastPassword = $updatePassword->verifPassword();
            //Si la vérification du mot de passe renvoie true
            if (password_verify($password, $lastPassword->password))
            {   //Intégrer le mot de passe haché dans l'attribut password de l'instance $updatePassword
                $updatePassword->password = password_hash($newPassword, PASSWORD_BCRYPT);
                //Si la méthode updatePassword() revoie true
                if ($updatePassword->updatePassword())
                {  
                    echo '<p class="success">Votre mot de passe a bien été modifié</p>';
                }
                else
                {
                    echo '<p class="error">Votre mot de passe n\'a pas pu être modifié !</p>';
                }
            }
        }
    }