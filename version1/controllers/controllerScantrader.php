<?php

function scantrader()
{
    $scantradTeam = NEW ScantradTeams();
    $scantradTeam->idUsers = $_SESSION['id'];
    if (isset($_POST['addTeamSubmit']))
    {
        if (!empty($_POST['newTeam']))
        {
            if (preg_match('/./', $_POST['newTeam']))
            {
                $newTeam = htmlspecialchars($_POST['newTeam']);
                $scantradTeam->teams = $newTeam;
                if (!$scantradTeam->verifScantradTeamExist())
                {
                    if ($scantradTeam->addScantradTeam())
                    {
                        $formResult['addNewTeam'] = 'La nouvelle team a bien été créé';
                    }
                    else
                    {
                        $formResult['addNewTeam'] = 'La nouvelle team n\'a pas pu etre créé';
                    }
                }
                else
                {
                    $formError['addNewTeam'] = 'Ce nom de team existe deja !';
                }
            }
            else
            {
                $formError['addNewTeam'] = 'Vous avez entré des caracteres non autorisé !';
            }
        }
        else
        {
            $formError['addNewTeam'] = 'Vous devez entrer un nom pour votre team !';
        }
    }
    $listOfTeams = $scantradTeam->getTeamsByUserId();
    if (!is_bool($listOfTeams))
    {
        $formError['myTeamCreated'] = true;
    }
    else
    {
        $formError['myTeamCreated'] = false;
    }
    require 'views/scantrader.php';
}
