<div id="mangasTeam" class="hide">            
        <!-- Mangas --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!-- Liste ------------------------------------------------------------------------------------------------------------->
        <h3>Series</h3>
        <div class="grid-x align-center">
        <table border="1" class="large-11">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($mangaList as $infos)
                {
                    ?>
                    <tr>
                        <td><a href="index.php?page=ficheSerie&id=<?= $infos->id ?>"><?= $infos->title ?></a></td>
                        <td><a href="index.php?page=ficheSerie&id=<?= $infos->id ?>"><?= $infos->category ?></a></td>
                        <td><a href="index.php?page=ficheSerie&id=<?= $infos->id ?>"><?= $infos->types ?></a></td>
                        <td><a href="index.php?page=ficheSerie&id=<?= $infos->id ?>"><?= $infos->status ?></a></td>
                    </tr>                    
                <?php }
                ?>
            </tbody>
        </table>
        </div>
        <hr class="separat" />
        <!-- Ajouter un serie ------------------------------------------------------------------------------------------------------------->
        <?php
        if (isset($formError['verif']))
        {
            ?>
            <p class="error"><?= $formError['verif'] ?></p>
            <?php
        }
        if ((isset($_SESSION['memberTeamRight']) && ($_SESSION['memberTeamRight'] == 1)) OR (isset($_SESSION['idMemberRight']) && $_SESSION['idMemberRight'] == 1))
        {
            ?>            
            <button id="boxShowHide" type="submit" class="boxShowHide secondary button">Ajouter une série</button>
            <div id="showHide" class="hide">        
                <h3>Ajouter une serie</h3>
                <!-- Formulaire d'ajout --------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <form action="#" method="POST">
                    <div>
                        <!-- Titre --------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <label for="title">Titre</label>
                        <input id="title" type="text" name="title" value="" />
                    </div>
                    <div>
                        <!-- Auteur --------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <label for="author">Auteur du manga</label>
                        <select id="author" name="author">
                            <?php
                            foreach ($authorsList as $list)
                            {
                                ?>
                                <option value="<?= $list->id ?>"><?= $list->name ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div>
                        <!-- Date de création ---------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <label for="creationDate">Date de création</label>
                        <input id="creationDate" type="date" name="creationDate" value="" />
                    </div>
                    <div>
                        <!-- Synopsis --------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <label for="synopsis">Synopsis</label>
                        <textarea id="synopsis" type="text" name="synopsis" value="" ></textarea>
                    </div>
                    <div>
                        <!-- Type de manga ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                        <label for="mangaType">Type de manga</label>
                        <select id="mangaType" name="mangaType">
                            <?php
                            //Boucle générant la liste des types
                            foreach ($typeList as $list)
                            {
                                ?>
                                <option value="<?= $list->id ?>"><?= $list->types ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div>
                        <!-- Catégorie du manga ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                        <label for="category">Catégorie du manga</label>
                        <select id="category" name="category">
                            <?php
                            //Boucle générant la liste des catégories
                            foreach ($categoryList as $list)
                            {
                                ?>
                                <option value="<?= $list->id ?>"><?= $list->category ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div>
                        <!-- Genres ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                        <h5>Genre</h5>
                        <?php
                        //Boucle générant la liste des genres
                        foreach ($kindList as $list)
                        {
                            ?>
                            <div class="checkList">                
                                <input type="checkbox" id="<?= $list->id ?>" name="kinds[]" value="<?= $list->id ?>">
                                <label for="<?= $list->id ?>"><?= $list->kind ?></label>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div>
                        <!-- Status du manga ------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <label for="status">Status du manga</label>
                        <select id="status" name="status">
                            <?php
                            //Boucle générant la liste des status
                            foreach ($statusList as $list)
                            {
                                ?>
                                <option value="<?= $list->id ?>"><?= $list->status ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div>
                        <!-- Bouton de validation ---------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <input type="submit" name="addMangaSubmit" value="Ajouter" />
                    </div>
                </form>
            </div>
        </div>
    <?php }
    ?>