<?php
require_once 'controllers/controllerConnection.php';

if (!empty($_SESSION['isConnected']) && $_SESSION['isConnected'] = true) { ?>
    <div id="profil" class="profil">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <h5 id="connectionTitle" class="text-center large-12"><?= $_SESSION['login'] ?></h5>
                <hr class="separatSlim" />
                <img id="avatarProfilConnection" src="<?= $_SESSION['avatar'] ?>" width="150px"/>
                <p id="lastConnexion" class="text-center large-12">Derniere connexion <?= $_SESSION['lastConnection'] ?></p>
            </div>
            <div class="large-12">
                <buton id="disconnection" class="hollow button buttonPerso1"><a href="profil-utilisateur.html">Voir le profil</a></buton>
            </div>
            <div class="large-12">
                <buton id="disconnection" class="hollow button buttonPerso1"><a href="mode-scantradeur.html">Mode scantradeur</a></buton>
            </div>
                <?php
             if (session_id())
             {
                 if ($_SESSION['idMemberRight'] == 1)
                 { ?>
            <div class="large-12">
                <buton id="disconnection" class="hollow button buttonPerso1"><a href="palais-de-glace.html">Administration</a></buton>
            </div>
                     
               <?php }
             }
             ?>
        </div>
    </div>
    <?php } else { ?>
    <div id="profil" class="profil">
        <form class="grid-x grid-padding-x align-center" action="#" method="POST">
            <h3 id="connectionTitle">Profil</h3>
            <hr class="separatSlim" />
            <div class="grid-container">
                <?php
                if (!empty($formError['connection'])) { ?>
                    <p class="errorMessages"><?= $formError['connection'] ?></p>
                <?php } ?>
                <div class="grid-x grid-padding-x">
                    <div class="textConnection">
                        <label class="inputConnection" for="loginConnection">Pseudo
                            <input class="inputConnection" type="text"  id="loginConnection" name="loginConnection" value="<?= !empty($loginConnection) ? $loginConnection : NULL ?>" />
                        </label>
                        <?php
                        if (!empty($formError['loginConnection'])) { ?>
                            <p class="warningClass"><?= $formError['loginConnection'] ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="textConnection">
                        <label class="inputConnection" for="passwordConnection">Mot de Passe
                            <input class="inputConnection" type="password" id="passwordConnection" name="passwordConnection" value="<?= !empty($passwordConnection) ? $passwordConnection : NULL ?>" />
                        </label>
                        <?php
                        if (!empty($formError['passwordConnection'])) { ?>
                            <p class="warningClass"><?= $formError['passwordConnection'] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <input class="buttonPerso1" type="submit" name="connectionSubmit" value="Connexion" />
        </form>
    </div>
<?php } ?>