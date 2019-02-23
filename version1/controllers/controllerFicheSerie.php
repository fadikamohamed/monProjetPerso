<?php

if (!session_id())
{
    require_once '../configuration.php';
}

function ficheSerie($id)
{
    $manga = NEW Mangas();
    $manga->idMangas = $id;
    $mangaInfo = $manga->getMangaInfoById();
    $mangaKinds = $manga->getMangasKinds();
    $_SESSION['mangaTitle'] = $mangaInfo->title;
    $_SESSION['idManga'] = $mangaInfo->id;
    $_SESSION['idTeam'] = $mangaInfo->idScantradTeams;

    $chapters = NEW Chapters();
    $chapters->idMangas = $_SESSION['idManga'];
    $chapterList = $chapters->getListChapters();

    $comments = NEW Comments();
    $comments->idMangas = $_SESSION['idManga'];
    $commentsList = $comments->getMangaComments();

    if (isset($_SESSION['isConnected']))
    {
        $ifMangaIsLiked = NEW MangasLiked();
        $ifMangaIsLiked->idUser = $_SESSION['id'];
        $ifMangaIsLiked->idManga = $_SESSION['idManga'];
        $result = $ifMangaIsLiked->ifMangaIsLiked();
        if ($result != false)
        {
            $_SESSION['mangaLiked'] = true;
        }
        else
        {
            $_SESSION['mangaLiked'] = false;
        }
    }
    require 'views/ficheSerie.php';
}

if (!empty($_FILES))
{
    $ds = DIRECTORY_SEPARATOR;
    $title = str_replace(' ', '_', $_SESSION['mangaTitle']);
    $idTeam = $_SESSION['idTeam'];
    $idManga = $_SESSION['idManga'];
    $storeFolder = '/home/mohamedf/Documents/monProjetPerso/version1/mangas' . $ds . $idTeam . $ds . $idManga . $ds . 'chapters';
    if (isset($_SESSION['folderIn']))
    {
        $tempFile = $_FILES['file']['tmp_name'];
        $targetFile = $storeFolder . '/' . $_SESSION['folderIn'] . '/' . $_FILES['file']['name'];
        move_uploaded_file($tempFile, $targetFile);
    }
}

if (isset($_POST['sendedComment']))
{
    $comment = NEW Comments();
    $comment->idMangas = $_SESSION['idManga'];
    $comment->idUser = $_SESSION['id'];
    $comment->comment = htmlspecialchars($_POST['sendedComment']);
    if ($comment->addMangaComment())
    {
        echo 'Votre commentaire a bien été ajouté';
    }
    else
    {
        echo 'Votre commentaire n\'a pas pu être ajouté';
    }
}

if (isset($_POST['deleteMangaPassword']))
{
    $password = htmlspecialchars($_POST['deleteMangaPassword']);
    $verifPassword = NEW Users();
    $verifPassword->id = $_SESSION['id'];
    $verifPasswordExist = $verifPassword->verifPassword();
    if (password_verify($password, $verifPasswordExist->password))
    {

        $deleteMangasComments = NEW Comments();
        $deleteMangasComments->idMangas = $_SESSION['idManga'];

        $deleteMangasKinds = NEW MangasKinds();
        $deleteMangasKinds->idMangas = $_SESSION['idManga'];

        $deleteMangasAuthors = NEW MangasAuthors();
        $deleteMangasAuthors->idMangas = $_SESSION['idManga'];

        $deleteMangasTeams = NEW MangasTeams();
        $deleteMangasTeams->idMangas = $_SESSION['idManga'];

        $deleteMangasChapters = NEW Chapters();
        $deleteMangasChapters->idMangas = $_SESSION['idManga'];

        $deleteManga = NEW Mangas();
        $deleteManga->idMangas = $_SESSION['idManga'];

        $addMangasDeleted = NEW MangasDeleted();
        $addMangasDeleted->title = $_SESSION['mangaTitle'];
        $addMangasDeleted->idMangas = $_SESSION['idManga'];
        $addMangasDeleted->idTeams = $_SESSION['idTeam'];

        $connection = SingletonClass::getInstance();
        $pdo = $connection->pdo;

        try {

            $pdo->beginTransaction();

            $deleteMangasComments->deleteMangaComments();

            $deleteMangasKinds->deleteMangaKinds();

            $deleteMangasAuthors->deleteMangaAuthor();

            $deleteMangasTeams->deleteMangaTeam();

            $deleteMangasChapters->deleteChapters();

            $deleteManga->deleteManga();

            $addMangasDeleted->addMangaDeleted();

            $pdo->commit();
            echo '<p class="success">Le manga a été supprimé avec succes</p>';
        } catch (Exception $ex) {
            $pdo->rollBack();
            echo '<p class="error">Le manga n\'a pas été supprimé !</p>';
        }
    }
    else
    {
        echo '<p class="error">Votre mot de passe est invalide !</p>';
    }
}

if (!empty($_POST['addMangaLiked']))
{
    if (is_numeric($_POST['addMangaLiked']))
    {
        $idMangaLiked = htmlspecialchars($_POST['addMangaLiked']);
        $addMangaLiked = NEW MangasLiked();
        $addMangaLiked->idManga = $idMangaLiked;
        $addMangaLiked->idUser = $_SESSION['id'];
        if ($addMangaLiked->addMangaLiked())
        {
            $_SESSION['mangaLiked'] = true;
            echo true;
        }
        else
        {
            $_SESSION['mangaLiked'] = false;
            echo false;
        }
    }
}

if (!empty($_POST['removeMangaLiked']))
{
    if (is_numeric($_POST['removeMangaLiked']))
    {
        $idMangaLiked = htmlspecialchars($_POST['removeMangaLiked']);
        $removeMangaLiked = NEW MangasLiked();
        $removeMangaLiked->idManga = $idMangaLiked;
        $removeMangaLiked->idUser = $_SESSION['id'];
        if ($removeMangaLiked->removeMangaLiked())
        {
            $_SESSION['mangaLiked'] = false;
            echo true;
        }
        else
        {
            $_SESSION['mangaLiked'] = true;
            echo false;
        }
    }
}