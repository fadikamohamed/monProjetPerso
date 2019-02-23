<?php
require_once 'configuration.php';
require_once 'controllers/controllerRead.php';
if (isset($_GET['page']))
{
    $page = htmlspecialchars($_GET['page']);
}
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="author" content="" />
        <meta name="description" content="" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>title</title>
    </head>
    <body class="bgdark">
        <div class="readingPage">
            <h2><a href="index.php?page=ficheSerie&id=<?= $chapterInfo->idMangas ?>"><?= $chapterInfo->title ?></a></h2>
            <hr class="separat" />
            <h4><?= $chapterInfo->chapter ?></h4>
            <hr class="separatSlim" />
            <div>
                <?php
                if ($page > 1)
                {
                    ?>
                    <a class = "linkLeft" href = "?chapterId=<?= $chapterInfo->id ?>&page=<?= $page - 1 ?>">Page précédente</a>
                    <?php
                }
                for ($n = 1; $n <= $numberOfPages; $n++)
                {
                    ?>
                    <a href="?chapterId=<?= $chapterInfo->id ?>&page=<?= $n ?>" class="<?= $n == $page ? 'strong' : NULL ?>"><?= $n ?></a>
                    <?php
                }
                if ($page < $numberOfPages)
                {
                    ?>
                    <a class = "linkRight" href = "?chapterId=<?= $chapterInfo->id ?>&page=<?= $page + 1 ?>">Page suivante</a>
                <?php } ?>                
            </div>
            <hr class="separatSlim" />
            <a href="?chapterId=<?= $chapterInfo->id ?>&page=<?= $numberOfPages > $page ? $page + 1 : $page ?>"><img class="readingImg" src="<?= $chapterInfo->locationLink . '/' . $chapterPagesArray[$page] ?>" /></a>
        </div>
    </body>
</html>


