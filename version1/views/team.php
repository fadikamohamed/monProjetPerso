<div class="text-center">
    <h2><?= $showTeam->teams ?></h2>
    <!-- Menu ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <button id="teamHome">Accueil</button>
    <button id="teamMangas">Mangas</button>
    <button id="teamMembers">Membres</button>
    <?php
   /*if (isset($_SESSION['adminId']) && isset($_SESSION['id']) && $_SESSION['adminId'] == $_SESSION['id'])
   {*/
    echo isset($formError['showTeam']) ? $formError['showTeam'] : NULL;
    if (isset($memberTeamRight) && $memberTeamRight == 1) { ?>
        <button id="teamManagement">Gestion</button>
    <?php } ?>

    <?php require 'team/homeTeam.php'; ?>

    <?php require 'team/mangasTeam.php'; ?>

    <?php require 'team/membersTeam.php'; ?>

    
</div>
</div>