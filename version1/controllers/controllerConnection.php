<?php

//Si $_POST['connectionSubmit'] existe
if (isset($_POST['connectionSubmit']))
{   //Déclaration du tableau $formError
    $formError = array();
    //Déclaration de l'instance $connectUser de la class Users()
    $connectUser = NEW Users();
    //SI $_POST['loginConnection'] n'est pas vide
    if (!empty($_POST['loginConnection']))
    {   //Désactivation des balise contenu dans $_POST['loginConnection'] et l'intégration dans $loginConnection
        $loginConnection = htmlspecialchars($_POST['loginConnection']);
        //SI $loginConnection passe la regex
        if (preg_match('/./', $loginConnection))
        {   //Associer la valeur de la variable $loginConnection dans l'attribut $login de l'instance $connectUser
            $connectUser->login = $loginConnection;
            $loginVerif = $connectUser->checkIfLoginExist();
            //Si la méthode checkIfLoginExist() ne renvoie pas true
            if ($loginVerif->count == 0)
            {   //Intgration d'un message d'erreur dans le tableau d'érreur
                $formError['loginConnection'] = 'Ce pseudo n\'existe pas';
            }
        }//Sinon
        else
        {   //Intgration d'un message d'erreur dans le tableau d'érreur
            $formError['loginConnection'] = 'Le login entré contient des caracteres non autorisé !';
        }
    }//Sinon
    else
    {   //Intgration d'un message d'erreur dans le tableau d'érreur
        $formError['loginConnection'] = 'Vous devez entrer un login !';
    }
    
    //Si $_POST['passwordConnection'])) n'est pas vide
    if (!empty($_POST['passwordConnection']))
    {   //Désactivation des balises contenu dans $_POST['passwordConnection'])) et intégration dans $passwordConnection
        $passwordConnection = htmlspecialchars($_POST['passwordConnection']);
        //Si $passwordConnection passe la regex
        if (preg_match('/./', $passwordConnection))
        {
            
        }//Sinon
        else
        {   //Intgration d'un message d'erreur dans le tableau d'érreur
            $formError['passwordConnection'] = 'Le mot de passe entré contient des caracteres non autorisé !';
        }
    }//Sinon
    else
    {   //Intgration d'un message d'erreur dans le tableau d'érreur
        $formError['passwordConnection'] = 'Vous devez entrer un mot de passe !';
    }
    
    //Si le nombre d'entrés dans le tableau est égale a 0 
    if (count($formError) == 0)
    {   //Associer la valeur de $passwordConnection a l'attribut $password de l'instance $connectUser
        $connectUser->password = password_hash($passwordConnection, PASSWORD_BCRYPT);
        $profilUser = $connectUser->connectionUser();
        if (is_object($profilUser))
        {
            if ($profilUser->disabled == 1)
            {
                $passwordVerif = password_verify($passwordConnection, $profilUser->password);
                if ($passwordVerif == 1)
                {
                    
                    $connectUser->id = $profilUser->id;
                    $lastConnection = $connectUser->updateLastConnection();
                    if (is_object($lastConnection))
                    {
                        $_SESSION['id'] = $profilUser->id;
                        $_SESSION['login'] = $profilUser->login;
                        $_SESSION['birthdate'] = $profilUser->birthdate;
                        $_SESSION['avatar'] = $profilUser->avatarLink;
                        $_SESSION['isConnected'] = true;
                        $_SESSION['mail'] = $profilUser->mail;
                        $_SESSION['gender'] = $profilUser->gender;
                        $_SESSION['country'] = $profilUser->country;
                        $_SESSION['registrationDate'] = $profilUser->registrationDate;
                        $_SESSION['idMemberRight'] = $profilUser->idMembersRights;
                        $_SESSION['lastConnection'] = $lastConnection->lastConnection;
                        header('Location: profil-utilisateur.html');
                    }else{
                        $formError['connection'] = 'Une érreur est survenue !';
                    }
                }
                else
                {
                    $formError['passwordConnection'] = 'Mauvais mot de passe !';
                }
            } else{
                $formError['connection'] = 'Ce compte n\existe pas ou a était supprimé !';
            }
        }else{
            $formError['connection'] = 'Impossible d\'obtenir les informations de l\'utilisateur';
        }
    }
}