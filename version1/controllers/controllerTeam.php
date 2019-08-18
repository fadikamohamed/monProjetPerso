<?php

function team($id)
{

    $_SESSION['idTeam'] = $id;
    $members = NEW Users();
    $members->idScantradTeams = $id;
    $membersList = $members->getMembresTeam();
    $getTeam = NEW ScantradTeams();
    $getTeam->id = $id;    
    $showTeam = $getTeam->getTeamById();
    if (isset($_SESSION['isConnected']) AND $_SESSION['isConnected'] = true)
    {        
        $getTeam->idUsers = $_SESSION['id'];
        
        if ($getUserTeamRight = $getTeam->getUserTeamRight())
        {
            $_SESSION['memberTeamRight'] = $getUserTeamRight->idMembersTeamRight;
        }
    }

    if (!is_object($showTeam))
    {
        $formError['showTeam'] = 'La requete a échoué !';
    }
    else
    {
        $_SESSION['adminId'] = $showTeam->createdByUserId;
    }

    $getCategory = NEW MangaCategory();
    $categoryList = $getCategory->getMangasCategory();
    $getType = NEW MangaTypes();
    $typeList = $getType->getMangasTypes();
    $getstatus = NEW MangaStatus();
    $statusList = $getstatus->getMangasStatus();
    $getKind = NEW MangaKinds();
    $kindList = $getKind->getMangasKinds();
    $getAuthors = NEW MangaAuthor();
    $authorsList = $getAuthors->getMangasAuthors();

    
    if (isset($_POST['addMangaSubmit']))
    {
        $formError = array();
        $mangas = NEW Mangas();

        if (!empty($_POST['title']))
        {
            if (preg_match('/./', $_POST['title']))
            {
                $title = htmlspecialchars($_POST['title']);
                $mangas->title = $title;
                $mangas->idScantradTeams = $_SESSION['idTeam'];
                $verifMangaExist = $mangas->verifMangaExist();
                if ($verifMangaExist)
                {
                    $formError['verif'] = 'Votre team a deja un manga qui porte se titre !';
                }
            }
            else
            {
                $formError['title'] = 'Le titre entré contient des caracteres non autorisé !';
            }
        }
        else
        {
            $formError['title'] = 'Vous devez entrer un titre !';
        }

        if (!empty($_POST['author']))
        {
            if (preg_match('/./', $_POST['author']))
            {
                $author = htmlspecialchars($_POST['author']);
                $mangas->author = $author;
            }
            else
            {
                $formError['author'] = 'Le nom entré contient des caracteres non autorisé !';
            }
        }
        else
        {
            $formError['author'] = 'Vous devez entrer un nom pour l\'auteur !';
        }

        if (!empty($_POST['creationDate']))
        {
            if (preg_match('/./', $_POST['creationDate']))
            {
                $creationDate = htmlspecialchars($_POST['creationDate']);
                $mangas->creationDate = $creationDate;
            }
            else
            {
                $formError['creationDate'] = 'La date entré n\' est pas valide !';
            }
        }
        else
        {
            $formError['creationDate'] = 'Vous devez entrer une date !';
        }

        if (!empty($_POST['synopsis']))
        {
            if (preg_match('/./', $_POST['synopsis']))
            {
                $synopsis = htmlspecialchars($_POST['synopsis']);
                $mangas->synopsis = $synopsis;
            }
            else
            {
                $formError['synopsis'] = 'Le synopsis contient des caracteres non autorisé !';
            }
        }
        else
        {
            $formError['synopsis'] = 'Veuillez entrer un synopsis !';
        }

        if (!empty($_POST['mangaType']))
        {
            if (preg_match('/./', $_POST['mangaType']))
            {
                $mangaType = htmlspecialchars($_POST['mangaType']);
                $mangas->idMangaTypes = $mangaType;
            }
            else
            {
                $formError['mangaType'] = 'Veuillez choisir parmis les types de mangas proposé !';
            }
        }
        else
        {
            $formError['mangaType'] = 'Veuillez choisir un type de manga !';
        }

        if (!empty($_POST['category']))
        {
            if (preg_match('/./', $_POST['category']))
            {
                $category = htmlspecialchars($_POST['category']);
                $mangas->idCategory = $category;
            }
            else
            {
                $formError['category'] = 'Veuillez choisir une catégorie parmis celles qui vous sont proposé !';
            }
        }
        else
        {
            $formError['category'] = 'Veuillez choisir une categorie !';
        }

        if (!empty($_POST['kinds']))
        {
            if (is_array($_POST['kinds']))
            {

                foreach ($_POST['kinds'] as $key => $number)
                {
                    $kinds[$key] = htmlspecialchars($number);
                }
                $mangas->idKinds = $kinds;
                $kindsNumbers = count($kinds);
            }
        }

        if (!empty($_POST['status']))
        {
            if (preg_match('/./', $_POST['status']))
            {
                $status = htmlspecialchars($_POST['status']);
                $mangas->idPublicationStatus = $status;
            }
            else
            {
                $formError['status'] = 'Veuillez definir un status parmis ceux qui vous sont proposé !';
            }
        }
        else
        {
            $formError['status'] = 'Veuillez choisir un status pour la nouvelle serie!';
        }

        if (isset($formError) && (count($formError) == 0))
        {
            $mangas->idScantradTeams = $id;
            $mangas->addManga($kindsNumbers);
        }
    }
    $manga = NEW Mangas();
    $manga->idScantradTeams = $id;
    $mangaList = $manga->getMangaByTeamId();
    require 'views/team.php';
}

if (!empty($_POST['membersResearch']))
{
    require_once '../models/modelUsers.php';
    require_once '../models/connectionDB.php';
    $research = new Users();
    $research->research = htmlspecialchars($_POST['membersResearch']);
    $listResearch = $research->researchMembers();
    foreach ($listResearch as $list)
    {
        echo '<tr>
            <td><img class="avatarResearch" src="' . $list->avatarLink . '" /></td>
            <td>' . $list->login . '</td>
            <td><input id="' . $list->id . '" class="addMember" type="submit" value="Ajouter" /></td>
        </tr>';
    }
}