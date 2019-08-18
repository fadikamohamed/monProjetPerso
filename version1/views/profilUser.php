<?php
if (!session_id())
{
    require_once '../configuration.php';
}
?>
<div class="grid-container content">
    <div class="grid-x grid-padding-x align-center">
        <h2>Vue du profil</h2>
    </div>
    <form id="changeAvatarForm" action="#" method="POST" enctype="multipart/form-data">
        <div>
            <?php
            //Si $formError['file'] n'est pas vide
            if (!empty($formError['file']))
            {   //Afficher le message
                ?>
                <p class="text-center error"><?= $formError['file'] ?></p>
            <?php }
            ?>
            <?php
            //Si $formSuccess['file'] n'est pas vide
            if (!empty($formSuccess['file']))
            {   //Afficher le message
                ?>
                <p class="text-center success"><?= $formSuccess['file'] ?></p>
            <?php }
            ?>
        </div>
        <div class="grid-x grid-padding-x align-center">
            <img id="avatarProfil" src="<?= $_SESSION['avatar'] ?>" />
            <p class="large-12 text-center">Choisissez un nouvelle avatar pour le modifier</p>
            <input class="text-center" type="hidden" name="MAX_FILE_SIZE" value="5000000" />
            <input class="text-center" type="file" name="avatarProfil" value="" />
            <input id="avatarSubmit" type="submit" name="avatarSubmit" value="Changer l'avatar" />
        </div>
    </form>
    <div class="text-center">
        <button id="boxShowHide" class="secondary button cntr">Anciens avatars</button>
        <div id="showHide" class="grid-x grid-padding-x align-center profilBox hide">
            <?php
            //Si $avatarSource est un dossier
            if (is_dir($avatarSource))
            {  //Si le résultat de l'ouverture du dossier n'est pas nul              
                if (null !== ($directoryFile = opendir($avatarSource)))
                {   //Tant que la lecture du dossier fonctionne
                    while (false !== ($fileDirectory = readdir($directoryFile)))
                    {   //Déclarer la variable $link avec une valeure de 0
                        $link = 0;
                        //Concaténer le chemin du dossier avec le nom du fichier
                        $fileLink = $avatarSource . $fileDirectory;
                        //Si le fichier n'est ni un '.' ni un '.' ni un 'index.php'
                        if ($fileDirectory != '.' && $fileDirectory != '..' && $fileDirectory != 'index.php')
                        {   //Incrémenter $link de 1
                            $link ++;
                            ?>
                            <div class="avatarCard">
                                <a class="avatarButton" href="#"><button id="use<?= $link ?>" class="button success">Utiliser</button></a>
                                <img class="avatarMini" src="<?= $fileLink ?>" />
                                <a class="avatarButton" href="#"><button id="del<?= $link ?>" class="button alert">Supprimer</button></a>
                            </div>
                            <?php
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    <hr class="separat" />
    <div class="showHideProfil hide">
        <div>
            <label for="">Pseudo : <input id="login" type="text" name="login" value="" /></label>
            <?php
            if (isset($formError['login']))
            {
                ?>
                <p><?= $formError['login'] ?></p>
            <?php }
            ?>
        </div>
        <div>
            <label for="">Date de naissance : <input id="birthdate" type="date" name="birthdate" value="" /></label>
            <?php
            if (isset($formError['birthdate']))
            {
                ?>
                <p><?= $formError['birthdate'] ?></p>
            <?php }
            ?>
        </div>
        <div>
            <label for="">Adresse e-mail : <input id="mail" type="mail" name="mail" value="" /></label>
            <?php
            if (isset($formError['mail']))
            {
                ?>
                <p><?= $formError['mail'] ?></p>
            <?php }
            ?>
        </div> 
        <div>
            <label for="">Sexe : <select id="gender" name="gender">
                    <option value=""></option>
                    <option value="1">Homme</option>
                    <option value="2">Femme</option>
                </select></label>
            <?php
            if (isset($formError['gender']))
            {
                ?>
                <p><?= $formError['gender'] ?></p>
            <?php }
            ?>
        </div> 
        <div>
            <label for="">Pays : <select id="country" name="country">
                    <option value=""></option>
                    <?php
                    foreach ($countryListe as $country)
                    {
                        ?>
                        <option value="<?= $country->id ?>"><?= $country->country ?></option>

                    <?php }
                    ?>
                </select></label>
            <?php
            if (isset($formError['country']))
            {
                ?>
                <p><?= $formError['country'] ?></p>
            <?php }
            ?>
        </div>            
        <input id="profilModifSubmit" type="submit" name="profilModifSubmit" value="Valider les modifications" />
    </div>
    <div id="check"></div>
    <div id="profilBox" class="text-center profilBox">
        <p>Pseudo : <?= $_SESSION['login'] ?></p>

        <p>Né le : <?= $_SESSION['birthdate'] ?></p>

        <p>E-mail : <?= $_SESSION['mail'] ?></p>

        <p>Sexe : <?= $_SESSION['gender'] ?></p>

        <p>Pays : <?= $_SESSION['country'] ?></p>


        <button id="profilModifButton" class="secondary button">Modifier mes informations</button>
        <button id="passwordModifButton" class="secondary button">Modifier mon mot de passe</button>
        <div id="passwordModify" class="hide">
            <label for="">Mot de passe : <input id="password" type="password" name="" value="" /></label>
            <label for="">Nouveau mot de passe : <input id="newPassword" type="password" name="" value="" /></label>
            <label for="">Confirmation du nouveau mot de passe<input id="newPasswordConfirmation" type="password" name="" value="" /></label>
        </div>
        <div id="response">

        </div>
        <p>Inscrit depuis le : <?= $_SESSION['registrationDate'] ?></p>
        <p class="text-center large-12">Derniere connexion <?= $_SESSION['lastConnection'] ?></p>
    </div>
    <hr class="separat" />
    <div class="text-center profilBox">
        <?php
        if (isset($formStatus['deleteProfil']))
        {
            ?>
            <p><?= $formStatus['deleteProfil'] ?></p>
        <?php }
        ?>
        <form action="#" method="POST">
            <h3 class="warningClass">Supprimer le compte</h3>
            <p class="warningClass">Attention, cette action est irréversible ! ! !</p>
            <p class="warningClass">Vous ne pouvez pas supprimer votre compte si vous êtes créateur !</p>
            <label for="">Entrez votre mot de passe pour supprimer le compte</label>
            <input id="passwordForDelete" type="password" name="passwordForDelete" value="" />            
            <?php
            if (isset($formError['deleteProfil']))
            {
                ?>
                <p class="warningClass"><?= $formError['deleteProfil'] ?></p>
            <?php }
            ?>
            <input id="deleteUserSubmit" type="submit" name="deleteUserSubmit" value="Supprimer" />
        </form>
    </div>
</div>