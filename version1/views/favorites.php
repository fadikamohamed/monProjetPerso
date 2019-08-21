<?php
require_once 'controllers/controllerFavorites.php';

if (!empty($_SESSION['isConnected']) && $_SESSION['isConnected'] = true) {
?>

<div class="profil grid-x grid-padding-x align-center">
    <h4>Favoris</h4>
    <hr class="separatSlim" />
    <div class="align-center">
        <?php
        foreach ($mangasLikedList as $list){ ?>
        <p><a class="chapterLink" href="?page=ficheSerie&id=<?= $list->idMangas ?>"><?= $list->title ?></a></p>
        <?php }
        ?>
    </div>
</div>
<?php
}
?>