<?php

//Si $_GET['page'] existe
if (isset($_GET['page']))
{   //Si $_GET['page'] est égale a 'registration'
    if ($_GET['page'] == 'registration')
    {   //Appeler le fichier addUser.php
        require_once 'controllers/addUser.php';
        //Appeler la fonction addUser()
        addUser();
    }//Sinon si $_GET['page'] est égale a 'accueil'
    elseif ($_GET['page'] == 'accueil')
    {   //Si $_GET['status'] existe et que $_GET['status'] est égale a 'disconect'
        if (isset($_GET['status']) && ($_GET['status'] == 'disconect'))
        {   //Appeler le fichier disconnection.php
            require_once 'controllers/disconnection.php';
            //Rediriger vers index.php
            header('Location: Accueil.html');
        }//Sinon
        else
        {   //Appeler la vue Accueil.php
            require_once 'views/Accueil.php';
        }
    }//Sinon si $_GET['page'] est égale a 'readInLine'
    elseif ($_GET['page'] == 'readInLine')
    {   //Appeler le fichier controllerReadInLine.php
        require_once 'controllers/controllerReadInLine.php';
        //Appeler la fonction readInLine()
        readInLine();
    }
    elseif (($_GET['page'] == 'ficheSerie') && (is_numeric($_GET['id'])))
    {
        require_once 'controllers/controllerFicheSerie.php';
        ficheSerie($_GET['id']);
    }//Sinon si $_GET['page'] est égale a 'teams'
    elseif ($_GET['page'] == 'teams')
    {   //Appeler le fichier controllerTeams.php
        require_once 'controllers/controllerTeams.php';
        //Appeler la fonction teams()
        teams();
    }//Sinon si $_GET['page'] est égale a 'teams' et que $_GET['id'] est un nombre
    elseif (($_GET['page'] == 'team') && (is_numeric($_GET['id'])))
    {   //Appeler le fichier controllerTeam.php
        require_once 'controllers/controllerTeam.php';
        //Appeler la fonction team() et lui passer $_GET['id'] en argument
        team($_GET['id']);
    }//Sinon si $_SESSION['isConnected'] n'est pas vide et qu'il est égale a true
    elseif (!empty($_SESSION['isConnected']) && $_SESSION['isConnected'] == true)
    {   //Si $_GET['page'] est égale a 'profilUser'
        if ($_GET['page'] == 'profilUser')
        {   //Appeler le fichier controllerProfilUser.php
            require_once 'controllers/controllerProfilUser.php';
            //Appeler la fonction profilUser()
            profilUser();
        }//Sinon si $_GET['page'] est égale a 'scantrader'
        elseif ($_GET['page'] == 'scantrader')
        {   //Appeler le fichier controllerScantrader.php
            require_once 'controllers/controllerScantrader.php';
            //Appeler la fonction scantrader
            scantrader();
        }//Sinon
        elseif (($_GET['page'] == 'manageManga') && (is_numeric($_GET['id'])))
        {   //Appeler le fichier controllerScantrader.php
            require_once 'controllers/controllerManageManga.php';
            //Appeler la fonction scantrader
            ficheSerie($_GET['id']);
        }
        elseif ($_SESSION['idMemberRight'] == 1 && $_GET['page'] == 'Administration')
        {
            require_once 'controllers/controllerAdministration.php';
            adminitration();
        }//Sinon
        else
        {   //Rediriger vers index.php
            header('Location: index.php');
        }
    }//Sinon
    else
    {   //Appeler le fichier disconnection.php
        require_once 'controllers/disconnection.php';
        //Rediriger vers index.php
        header('Location: index.php');
    }
}//Sinon
else
{   //Appeler la vue Accueil.php
    require_once 'views/Accueil.php';
}