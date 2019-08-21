<div class="grid-container">
    <div class="text-center">
        <button id="boxShowHide" type="submit" class="boxShowHide secondary button">Recherche</button>
        <div id="showHide" class="hide">
            <form method="POST" action="#">
                <div class="grid-x grid-padding-x align-center">
                    <label class="large-4" for="">Par titre : </label>
                    <input class="large-8" type="text" name="search" value="" />
                </div>
                <div class="grid-x grid-padding-x">
                    <fieldset class="large-12 cell">
                        <legend class="">Par type : </legend>
                        <div>
                            <input type="checkbox" name="manfra" value="" /><label for="manfra">Manfra</label>                    
                            <input type="checkbox" name="manga" value="" /><label for="manfra">Manga</label>
                        </div>
                        <div>
                            <input type="checkbox" name="manhua" value="" /><label for="manfra">Manhua</label>
                            <input type="checkbox" name="manhwa" value="" /><label for="manfra">Manhwa</label>
                        </div>
                    </fieldset>
                </div>
                <div class="grid-x grid-padding-x align-center">
                    <label class="large-4" for="">Par titre</label>
                    <input class="large-8" type="text" name="search" value="" />
                </div>
                <div class="grid-x grid-padding-x align-center">
                    <label class="large-4" for="">Par titre</label>
                    <input class="large-8" type="text" name="search" value="" />
                </div>
                <div class="grid-x grid-padding-x align-center">
                    <label class="large-4" for="">Par titre</label>
                    <input class="large-8" type="text" name="search" value="" />
                </div>
                <div class="grid-x grid-padding-x align-center">
                    <label class="large-4" for="">Par titre</label>
                    <input class="large-8" type="text" name="search" value="" />
                </div>
                <div class="grid-x grid-padding-x align-center">
                    <label class="large-4" for="">Par titre</label>
                    <input class="large-8" type="text" name="search" value="" />
                </div>
                <div class="grid-x grid-padding-x align-center">
                    <label class="large-4" for="">Par titre</label>
                    <input class="large-8" type="text" name="search" value="" />
                </div>
                <input type="submit" value="Rechercher" />
            </form>
        </div>
    </div>
    <div class="grid-x grid-padding-x align-center">
        <h2>Liste des series</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Team</th>
                    <th>Type</th>
                    <th>Catégorie</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($mangasList as $list)
                {
                    ?>
                    <tr>
                        <td><a href="index.php?page=ficheManga&id=<?= $list->id ?>"><img class="mangaMini" src="<?= $list->pictureLink ?>" title="<?= $list->synopsis ?>" alt="Image de manga" /></a></td>
                        <td alt="Titre du manga"><a href="index.php?page=ficheSerie&id=<?= $list->id ?>"><?= $list->title ?></a></td>
                        <td alt="Nom de la team"><a href="index.php?page=team&id=<?= $list->idTeam ?>"><?= $list->team ?></a></td>
                        <td alt="Type du manga"><a href="index.php?page=ficheSerie&id=<?= $list->id ?>"><?= $list->type ?></a></td>
                        <td alt="Catégorie du manga"><a href="index.php?page=ficheSerie&id=<?= $list->id ?>"><?= $list->category ?></a></td>
                        <td alt="Status du manga"><a href="index.php?page=ficheSerie&id=<?= $list->id ?>"><?= $list->status ?></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>