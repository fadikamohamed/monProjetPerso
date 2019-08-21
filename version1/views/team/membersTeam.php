<div id="membersTeam" class="hide">
    <!-- Membres ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <h3>Membres</h3>
    <div class="grid-x align-center">
        <!--            <h4>Ajouter un membre</h4>
                                <form action="#" method="POST">
                    <label for="submitResearch">Entrez un pseudo : <input id="membersResearch" type="text" name="" value="" /></label>
                    <input id="membersResearchSubmit" type="submit" name="" value="Rechercher" />
                                    </form>
                    <div id="membersResearchResult">
                        Résultat de la recherche
                        <table border="1">
                            <tbody id="table">
                            </tbody>
                        </table>
                    </div>-->
        <!-- Liste des memebres --------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <h4>Liste des membres</h4>
        <table border="1" class="large-11">
            <thead>
                <tr>
                    <th></th>
                    <th>Pseudo</th>
                    <th>Rang</th>
                    <th>Membre depuis le</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Boucle générant la liste des membres de la team
                foreach ($membersList as $list) { ?>
                    <tr>
                        <td><img class="avatarResearch" src="<?= $list->avatarLink ?>" /></td>
                        <td><a href=""></a><?= $list->login ?></td>
                        <td><?= $list->rank ?></td>
                        <td><?= $list->addingDate ?></td>
                        <td><input id="" type="submit" name="" value="Retirer" /></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>