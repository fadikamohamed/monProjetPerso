<?php

if (!empty($_SESSION['isConnected']) && $_SESSION['isConnected'] = true)
{
    $mangaLiked = NEW MangasLiked();
    $mangaLiked->idUser = $_SESSION['id'];
    $mangasLikedList = $mangaLiked->getMangaLikedList();
}
