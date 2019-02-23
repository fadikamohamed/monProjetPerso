<?php

session_start();
require_once 'models/connectionDB.php';
require_once 'models/modelCategory.php';
require_once 'models/modelAuthors.php';
require_once 'models/modelStatus.php';
require_once 'models/modelTypes.php';
require_once 'models/modelKind.php';
require_once 'models/modelUsers.php';
require_once 'models/modelCountrys.php';
require_once 'models/scantradTeams.php';
require_once 'models/mangas.php';
require_once 'models/mangasAuthors.php';
require_once 'models/mangasKinds.php';
require_once 'models/mangasTeams.php';
require_once 'models/mangasdeleted.php';
require_once 'models/mangaLiked.php';
require_once 'models/modelChapters.php';
require_once 'models/modelComments.php';
require_once 'assets/regex.php';
require_once 'controllers/controllerConnection.php';
