<div>
    <h2 class="text-center">Tableau de bord</h2>
    <div>
        <h3>Mes teams</h3>
        <h4>Teams créé</h4>
        <table border="1">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date de création</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($formError['myTeamCreated'] == true)
                {
                    foreach ($listOfTeams as $listTeams)
                    {
                        ?>
                        <tr>
                            <td><a href="index.php?page=team&id=<?= $listTeams->id ?>"><?= $listTeams->teams ?></a></td>
                            <td><?= $listTeams->addingDate ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <hr class="separatSlim" />
        <h4>Membre de :</h4>
    </div>
    <hr class="separat" />
    <div>
        <h3>Créer une team</h3>
        <?php
        if (isset($formResult['addNewTeam']))
        {
            ?>
            <p><?= $formResult['addNewTeam'] ?></p>
        <?php }
        ?>
        <form action="#" method="POST">
            <div>
                <label for="newTeam">Nom de la nouvelle team</label>
                <input id="newTeam" type="text" name="newTeam" value="" />
            </div>
            <?php
            if (isset($formError['addNewTeam']))
            {
                ?>
                <p><?= $formError['addNewTeam'] ?></p>
            <?php }
            ?>
            <div>
                <input type="submit" name="addTeamSubmit" value="Créer" />
            </div>
        </form>
    </div>
</div>