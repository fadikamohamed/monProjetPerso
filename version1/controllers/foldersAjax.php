<?php

if (!session_id())
{
    require_once '../configuration.php';
}
$nbr_fichier = 0;
//Si $_POST['idChapter'] existe
if (isset($_POST['idChapter']))
{
    $idChapter = htmlspecialchars($_POST['idChapter']);
    //Ouvrir le dossier du chapitre
    if ($folder = opendir('../mangas' . '/' . $_SESSION['idTeam'] . '/' . $_SESSION['idManga'] . '/' . 'chapters' . '/' . $idChapter))
    {
        $_SESSION['folderIn'] = $idChapter;
        echo '<div id="back" class="draggable ui-widget-content back">'
        . '<img src="assets/img/retour.jpg" /></div>';
        while (false !== ($inFolder = readdir($folder)))
        {
            if ($inFolder != '.' && $inFolder != '..' && $inFolder != 'index.php')
            {
                $nameWithoutPoint = str_replace('.', '_', $inFolder);
                $nbr_fichier++;
                echo '<div id="img' . $nbr_fichier . '" class="draggable ui-widget-content chapterFolder">
                    <img class="imgFile" idChapter="' . $idChapter . '" id="img' . $nbr_fichier . '" src="mangas' . '/' . $_SESSION['idTeam'] . '/' . $_SESSION['idManga'] . '/' . 'chapters/' . $_SESSION['folderIn'] . '/' . $inFolder . '" />
                    <img id="delete' . $inFolder . '" src="assets/img/delete.png" class="deleteIcon" del="#img' . $nbr_fichier . '" />
            </div>';
            }
        }
        closedir($folder);
    }
}//Sinon si $_POST['newChapterName'] existe
elseif (isset($_POST['newChapterName']))
{
    $chapterName = htmlspecialchars($_POST['newChapterName']);
    //Si le dossier chapters existe
    if (is_dir('../mangas' . '/' . $_SESSION['idTeam'] . '/' . $_SESSION['idManga'] . '/' . 'chapters'))
    { //Créer le dossier du chapitre
        $folder = '../mangas' . '/' . $_SESSION['idTeam'] . '/' . $_SESSION['idManga'] . '/' . 'chapters' . '/' . $chapterName;
        if (mkdir($folder, 0777))
        {
            require_once '../models/connectionDB.php';
            require_once '../models/modelChapters.php';
            $newChapter = NEW Chapters();
            $newChapter->chapter = $chapterName;
            $newChapter->locationLink = 'mangas/' . $_SESSION['idTeam'] . '/' . $_SESSION['idManga'] . '/' . 'chapters' . '/' . $chapterName;
            $newChapter->idMangas = $_SESSION['idManga'];
            if ($newChapter->addChapter())
            {
                echo '<p class="success">Le dossier "' . $chapterName . '" a bien été créé.</p>';
            }
            else
            {
                echo '<p class="error">Le dossier "' . $chapterName . '" n\'a pu être créé !</p>';
            }
//            closedir($folder);
        }
        else
        {
            echo '<p class="error">Le dossier "' . $chapterName . '" existe deja !</p>';
        }
    }
}//Sinon
elseif (!isset($_POST['srcDeleteFile']))
{

    function teamFolder($storeFolder, $idTeam, $idManga)
    {
        if (mkdir($storeFolder, 0777))
        {   //Si le dossier est créé ajouter l'id du manga a la fin du chemin
            $storeFolder = $storeFolder . '/' . $idManga;
            //Créer le dossier du manga
            if (mkdir($storeFolder, 0777))
            {   //Si le dossier est créé ajouter le dossier chapitre a la fin du chemin
                $storeFolder = $storeFolder . '/' . 'chapters';
                //Créer le dossier chapters
                mkdir($storeFolder, 0777);
                return $storeFolder;
            }
        }
    }

    function mangaFolder($storeFolder)
    {
        //Créer le dossier du manga
        if (mkdir($storeFolder, 0777))
        {   //Si le dossier est créé ajouter le dossier chapitre a la fin du chemin
            $storeFolder = $storeFolder . '/' . 'chapters';
            //Créer le dossier chapters
            mkdir($storeFolder, 0777);
            return $storeFolder;
        }
    }

    $ds = DIRECTORY_SEPARATOR;
    $title = str_replace(' ', '_', $_SESSION['mangaTitle']);
    $idTeam = $_SESSION['idTeam'];
    $idManga = $_SESSION['idManga'];
    $storeFolder = '../mangas' . $ds . $idTeam;
    //Si le dossier n'existe pas
    if (!is_dir($storeFolder))
    {   //Créer le dossier de la team
        $storeFolder = teamFolder($storeFolder, $idTeam, $idManga);
    }//Sinon
    else
    {   //Si le dossier exite, ajouter l'id du manga a la fin du chemin
        $storeFolder = $storeFolder . $ds . $idManga;
        //Si le dossier n'exite pas...
        if (!is_dir($storeFolder))
        {   //Appeler la fonction mangaFolder, passer $storeFolder en argument et reuprérer la valeur retourné dans $storeFolder
            $storeFolder = mangaFolder($storeFolder);
        }//Sinon
        else
        {   //Si le dossier existe deja, ajouter le dossier chapitre a la fin du chemin
            $storeFolder = $storeFolder . $ds . 'chapters';
            //Si le dossier n'existe pas...
            if (!is_dir($storeFolder))
            {   //Créer le dossier
                mkdir($storeFolder, 0777);
            }
        }
    }

    //Ouvrir le dossier chapters
    if ($folder = opendir('../mangas' . '/' . $_SESSION['idTeam'] . '/' . $_SESSION['idManga'] . '/' . 'chapters'))
    { //Lire le contenu du dossier
        while (false !== ($inFolder = readdir($folder)))
        {
            if ($inFolder != '.' && $inFolder != '..' && $inFolder != 'index.php')
            {
                $nbr_fichier++;
                echo '<div id="' . $inFolder . '" class="draggable ui-widget-content dossier">
                <p>' . $inFolder . '</p>
                    <img id="' . $_SESSION['idManga'] . '"name="' . $inFolder . '" src="assets/img/delete.png" class="deletefolder" />
            </div>';
            }
        }
        closedir($folder);
    }
}

if (!empty($_POST['srcDeleteFile']))
{
    $src = htmlspecialchars($_POST['srcDeleteFile']);
    $deleteResult = unlink('../' . $src);
    if ($deleteResult == true)
    {
        echo 'true';
    }
    else
    {
        echo 'false';
    }
}

if (!empty($_POST['srcDeleteFolder']))
{
    $folderName = htmlspecialchars($_POST['nameFolder']);
    $folderid = htmlspecialchars($_POST['srcDeleteFolder']);
    $folderPath = '../mangas' . '/' . $_SESSION['idTeam'] . '/' . $_SESSION['idManga'] . '/' . 'chapters/' . $folderName;
    $deleteResult = rmdir($folderPath);
    if ($deleteResult == true)
    {
        echo 'true';
        $deleteChapter = NEW Chapters;
        $deleteChapter->chapter = $folderName;
        $deleteChapter->idMangas = $_SESSION['idManga'];
        $delete = $deleteChapter->deleteChapters();
    }
    else
    {
        echo 'false';
    }
}