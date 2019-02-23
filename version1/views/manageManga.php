<div class="mangaFiche">
    <h2><?= $mangaInfo->title ?></h2>
    <img class="mangaBanner" src="<?= $mangaInfo->pictureLink ?>" />
    <hr class="separatSlim" />
    <div id="showHide">        
        <form class="" action="#" method="POST">
            <input type="file" name="file" />
        </form>
    </div>
    <hr class="separat" />
    <div class="mangaSynopsis">        
        <h4>Synopsis</h4>    
        <p><?= $mangaInfo->synopsis ?></p>
    </div>
    <hr class="separat" />
    <h4>Informations</h4>
    <p>Équipe en charge : <?= $mangaInfo->teams ?></p>
    <p>Auteur : <?= $mangaInfo->name ?></p>
    <p>Type : <?= $mangaInfo->types ?></p>
    <p>Categorie : <?= $mangaInfo->category ?></p>
    <p>Status : <?= $mangaInfo->status ?></p>
    <p>Genres : <?php
        foreach ($mangaKinds as $kinds)
        {
            echo ' ' . $kinds->kind . ' ';
        }
        ?></p>
    <hr class="separat" />
    <h4>Gestion des publications</h4>
    <input id="bouttonf" type="submit" value="Dossier">
    <div id="containment-wrapper" class="hide">
        <label for="newChapter">Ajouter un chapitre : <input id="chapterName" type="text" name="newChapter" /></label>
        <input id="newChapterSubmit" type="submit" name="newChapterSubmit" value="Créer" />
        <div id="sortable">
        </div>
        <div id="addChapterResult"></div>
    </div>
    <div id="inputFilesChapters" class="hide">
        <form action="controllers/controllerManageManga.php" class="dropzone" paramName="chapter"></form>
    </div>
    <hr class="separatSlim" />
    <input id="deleteManga" type="submit" value="Supprimer le manga" />
    <div id="deleteMangaDialog" class="hide">
        <h6 class="warningClass">Veuillez taper votre mot de passe pour supprimer le manga</h6>
        <p class="warningClass">Attention, cette action est irréversible ! ! !</p>
        <input id="passwordForDeleteManga" type="password" name="passwordForDelete" value="" />
    </div>
    <hr class="separatSlim" />
    <table border="1">
        <thead>
            <tr>
                <th>Chapitre</th>
                <th>Ajouté le</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($chapterList as $list)
            {
                ?>
                <tr>
                    <td><?= $list->chapter ?></td>
                    <td><?= $list->addingDate ?></td>
                </tr>

            <?php }
            ?>
        </tbody>
    </table>
    <hr class="separat" />
    <h4>Commentaires</h4>
    <label for="">Commentaire <textarea id="commentText"></textarea></label>
    <input id="buttonComment" type="submit" name="commentSubmit" value="Poster" />
    <hr class="separatSlim" />
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($commentsList as $list)
                {
                    ?>
                    <tr>
                        <td width="50"><a href=""><img class="avatarMiniComment" src="<?= $list->avatarLink ?>" /></a><hr class="separatSlim" /><p class="commentProfil"><a href=""><?= $list->login ?></a></p></td>
                        <td class="table"><p class="commentDate"><?= $list->date ?></p><hr class="separatSlim" /><p class=""><?= $list->comment ?></p></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>