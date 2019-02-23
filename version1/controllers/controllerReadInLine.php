<?php

function readInLine()
{
    $mangas = NEW Mangas();
    $mangasList = $mangas->getMangasList();
    if (is_object($mangasList))
    {
        
    }
    require 'views/readInLine.php';
}
