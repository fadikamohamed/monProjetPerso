<?php

if (isset($_GET['chapterId']))
{
    $chapter = NEW Chapters();
    $chapter->id = htmlspecialchars($_GET['chapterId']);
    $chapterInfo = $chapter->getChapterById();
    $page = 1;
    if ($chapterFolder = opendir($chapterInfo->locationLink))
    {
        $i = 0;
        $chapterPagesArray = array();
        $chapterPages = scandir($chapterInfo->locationLink);
//        while (false !== ($chapterPages = scandir($chapterFolder)))
//        {
        foreach ($chapterPages as $list) {
            
        if ($list != '.' && $list != '..')
        {
            $i++;
            $chapterPagesArray[$i] = $list;
        }
        }
//        }
        $numberOfPages = count($chapterPagesArray);
    }
}