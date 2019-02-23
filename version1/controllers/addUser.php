<?php

//Déclaration de la fonction addUser()
function addUser()
{   //Déclaration de l'instance $countrys de la class Countrys()
    $countrys = NEW Countrys();
    //Récupérer la liste des pays avec la méthode getListCountrys()
    $countrysSelect = $countrys->getListCountrys();
    //Déclaration de l'instance $addUser de la class Users()
    $addUser = NEW Users();
    //Si $_POST['addSubmit'] existe
    if (isset($_POST['addSubmit']))
    {   //Déclarer le tableau $formError[]
        $formError = array();
        //Si $_POST['loginRegistration'] n'est pas vide
        if (!empty($_POST['loginRegistration']))
        {   //Si $_POST['loginRegistration'] passe la regex
            if (preg_match('/./', $_POST['loginRegistration']))
            {   //Désactiver les balises qu'elle contient avec htmlspecialchar() et l'intégrer dans la variable $loginRegistration
                $loginRegistration = htmlspecialchars($_POST['loginRegistration']);
                //Hydrater l'attribut login de l'instance $addUser avec la valeur de la variable $loginRegistration
                $addUser->login = $loginRegistration;
                //Récupérer le résultat de la méthode checkIfLoginExist() de l'instance $addUser et l'intégrer dans la variable $loginVerif
                $loginVerif = $addUser->checkIfLoginExist();
                //Si le résultat est égale a 1
                if ($loginVerif->count == 1)
                {   //Intégrer un méssage d'érreur dans le tableau $formError
                    $formError['loginRegistration'] = 'Ce pseudo existe deja !';
                }
            }
            else
            {   //Intégrer un méssage d'érreur dans le tableau $formError
                $formError['loginRegistration'] = 'Ce champ n\'est pas valide !';
            }
        }
        else
        {   //Intégrer un méssage d'érreur dans le tableau $formError
            $formError['loginRegistration'] = 'Ce champ ne peux pas rester vide !';
        }



        if (!empty($_POST['birthdateRegistration']))
        {
            if (preg_match('/./', $_POST['birthdateRegistration']))
            {
                $birthdateRegistration = htmlspecialchars($_POST['birthdateRegistration']);
            }
            else
            {   //Intégrer un méssage d'érreur dans le tableau $formError
                $formError['birthdateRegistration'] = 'Ce champ n\'est pas valide !';
            }
        }
        else
        {   //Intégrer un méssage d'érreur dans le tableau $formError
            $formError['birthdateRegistration'] = 'Ce champ ne peux pas rester vide !';
        }



        if (!empty($_POST['mailRegistration']))
        {
            if (preg_match('/./', $_POST['mailRegistration']))
            {
                $mailRegistration = htmlspecialchars($_POST['mailRegistration']);
                $addUser->mail = $mailRegistration;
                $MailVerif = $addUser->checkIfMailExist();
                if ($MailVerif->count == 1)
                {   //Intégrer un méssage d'érreur dans le tableau $formError
                    $formError['mailRegistration'] = 'Cette e-mail existe deja !';
                }
            }
            else
            {   //Intégrer un méssage d'érreur dans le tableau $formError
                $formError['mailRegistration'] = 'Ce champ n\'est pas valide !';
            }
        }
        else
        {   //Intégrer un méssage d'érreur dans le tableau $formError
            $formError['mailRegistration'] = 'Ce champ ne peux pas rester vide !';
        }



        if (!empty($_POST['genderRegistration']))
        {
            if (preg_match('/./', $_POST['genderRegistration']))
            {
                $genderRegistration = htmlspecialchars($_POST['genderRegistration']);
            }
            else
            {   //Intégrer un méssage d'érreur dans le tableau $formError
                $formError['genderRegistration'] = 'Ce champ n\'est pas valide !';
            }
        }
        else
        {   //Intégrer un méssage d'érreur dans le tableau $formError
            $formError['genderRegistration'] = 'Ce champ ne peux pas rester vide !';
        }

        if (!empty($_POST['countrysRegistration']))
        {
            if (preg_match('/./', $_POST['countrysRegistration']))
            {
                $countrysRegistration = htmlspecialchars($_POST['countrysRegistration']);
            }
            else
            {   //Intégrer un méssage d'érreur dans le tableau $formError
                $formError['countrysRegistration'] = 'Veuillez choisir un pays uniquement dans les choix proposé !';
            }
        }
        else
        {   //Intégrer un méssage d'érreur dans le tableau $formError
            $formError['countrysRegistration'] = 'Veuillez choisir un pays !';
        }


        //Si $_POST['password'] n'est pas vide
        if (!empty($_POST['passwordRegistration']))
        {   //Si $_POST['password'] passe la regex
            if (preg_match('/./', $_POST['passwordRegistration']))
            {   //Désactiver les balise de la valeur de $_POST['password'] et l'incérer dans $password
                $passwordRegistration = $_POST['passwordRegistration'];
                //Si $_POST['confirmPassword'] n'est pas vide
                if (!empty($_POST['confirmPassword']))
                {   //Si $_POST['confirmPassword'] passe la regex
                    if (preg_match('/./', $_POST['confirmPassword']))
                    {   //Désactiver les balises de la valeur $_POST['confirmPassword'] et l'incérer dans $confirmPassword
                        $confirmPassword = $_POST['confirmPassword'];
                        //Si les deux mots de passe ne sont pas identiques
                        if ($passwordRegistration != $confirmPassword)
                        {   //Intégrer un méssage d'érreur dans le tableau $formError
                            $formError['passwordRegistration'] = 'Les deux mots de passe doivent etre identiques !';
                            $formError['confirmPassword'] = 'Les deux mots de passe doivent etre identiques !';
                        }
                    }//Sinon
                    else
                    {   //Intégrer un méssage d'érreur dans le tableau $formError
                        $formError['confirmPassword'] = 'Ce champ n\'est pas valide !';
                    }
                }
                else
                {   //Intégrer un méssage d'érreur dans le tableau $formError
                    $formError['confirmPassword'] = 'Ce champ ne peux pas rester vide !';
                }
            }
            else
            {   //Intégrer un méssage d'érreur dans le tableau $formError
                $formError['passwordRegistration'] = 'Ce champ n\'est pas valide !';
            }
        }
        else
        {   //Intégrer un méssage d'érreur dans le tableau $formError
            $formError['passwordRegistration'] = 'Ce champ ne peux pas rester vide !';
        }

        //Si $_POST['addSubmit'] existe et que le tableau $formError est vide
        if (isset($_POST['addSubmit']) && count($formError) == 0)
        {   //Hydrater l'attribut login avec la valeur de la variable $loginRegistration
            $addUser->login = $loginRegistration;
            //Hydrater l'attribut birthdate avec la valeur de la variable $birthdateRegistration
            $addUser->birthdate = $birthdateRegistration;
            //Hydrater l'attribut mail avec la valeur de la variable $mailRegistration
            $addUser->mail = $mailRegistration;
            //$passwordRegistration = crypt($passwordRegistration, CRYPT_BLOWFISH);
            $addUser->password = password_hash($passwordRegistration, PASSWORD_BCRYPT);
            //Hydrater l'attribut gender avec la valeur de la variable $genderRegistration
            $addUser->gender = $genderRegistration;
            //Hydrater l'attribut idCountrys avec la valeur de la variable $countrysRegistration
            $addUser->idCountrys = $countrysRegistration;
            //Si la méthode addUser() de l'instance addUser est égal a true
            if ($addUser->addUser())
            {  //Revoyer un message avec echo
                echo 'Votre compte a bien était enregistrer !';
            }
            else
            {  //Revoyer un message avec echo
                echo 'L\'utilisateur n\'a pas était enregistré !';
            }
        }
    }
    //Appeler le fichier de la vue
    require 'views/registration.php';
}
