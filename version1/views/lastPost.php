<?php
require_once 'controllers/controllerLastPost.php';
?>
<div class="profil grid-x grid-padding-x align-center">
    <h4>Dernieres sorties</h4>
    <hr class="separatSlim" />
    <div class="">
        <?php
        foreach ($lastPostList as $list)
        {
            ?>
            <p><a id="<?= $list->id ?>" class="chapter chapterLink"><?= $list->title ?> : <?= $list->chapter ?></a></p>
        <?php }
        ?>
    </div>
</div>