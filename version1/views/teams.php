<div>
    <h2>Liste des teams de scantrad</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Createur</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($teamList as $list) { ?>
            <tr>
                <td><a href="index.php?page=team&id=<?= $list->id ?>"><?= $list->teams ?></a></td>
                <td><?= $list->login ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>