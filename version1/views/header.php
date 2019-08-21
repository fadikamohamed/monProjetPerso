<?php
require_once 'configuration.php';
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
        <link rel="stylesheet" href="assets/frameworks/foundation/dist/css/foundation.css" />
        <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Communi'Scans</title>
    </head>
    <body class="">
        <div class="">
            <header class="grid-x grid-padding-x">
                <div id="banner"><h1 id="title">Communi'Scans</h1></div>
                <div id="navBar" class="top-bar">
                    <div id="navBar2" class="top-bar-left">
                        <ul class="dropdown menu align-center secondary button-group" date-dropdown-menu>
                            <li class="buttonPerso1"><a href="Accueil.html">Accueil</a></li>
                            <li class="buttonPerso1"><a href="index.php?page=readInLine">Lecture en ligne</a></li>
                            <li class="buttonPerso1"><a href="teams.html">Teams</a></li>
<!--                            <li class="buttonPerso1"><a href="?page=accueil">Forum</a></li>-->
                            <li class="buttonPerso1"><a href="?page=accueil">Contact</a></li>
                            <?php
                            if (!empty($_SESSION['isConnected']) && $_SESSION['isConnected'] = true)
                            {
                                ?>
                                <li class="buttonPerso1"><a href="disconnection.html">Déconnexion</a></li>
                                <?php
                            }
                            else
                            {
                                ?>
                                <li class="buttonPerso1"><a href="inscription.html">Inscription</a></li>
                                <?php }
                                ?>
                        </ul>
                    </div>
                </div><?php
                var_dump($_SESSION['idManga']);
                var_dump($_SESSION['delete']);
                var_dump($_SESSION['deleteResult']);
                ?>
            </header>
        </div>