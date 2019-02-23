<div class="grid-container profil">
    <div class="grid-x grid-padding-x align-center">
        <h2 class="">Formulaire d'inscription</h2>
        <div class="grid-x grid-padding-x align-center">            
            <p class="error"><?= isset($formError['error']) ? $formError['error'] : NULL ?></p>
        </div>
        <form class="large-12" action="#" method="POST">
            <!-- Pseudo -->
            <div class="grid-x grid-padding-x align-center">            
                <label class="large-2" for="loginRegistration">Pseudo : </label>
                <input class="large-4" type="text" id="login" name="loginRegistration" value="<?= !empty($_POST['loginRegistration']) ? $_POST['loginRegistration'] : NULL ?>" />
            </div>
            <div class="grid-x grid-padding-x align-center">                    
                <p class="error"><?= isset($formError['loginRegistration']) ? $formError['loginRegistration'] : NULL ?></p>
            </div>
            <!-- Date de naissance -->
            <div class="grid-x grid-padding-x align-center">            
                <label class="large-2" for="birthdateRegistration">Date de naissance : </label>
                <input class="large-4" type="date" id="birthdate" name="birthdateRegistration" value="<?= !empty($_POST['birthdateRegistration']) ? $_POST['birthdateRegistration'] : NULL ?>" />
            </div>
            <div class="grid-x grid-padding-x align-center">                    
                <p class="error"><?= isset($formError['birthdateRegistration']) ? $formError['birthdateRegistration'] : NULL ?></p>
            </div>
            <!-- Adresse e-mail -->
            <div class="grid-x grid-padding-x align-center">            
                <label class="large-2" for="mailRegistration">Adresse e-mail : </label>
                <input class="large-4" type="mail" id="mail" name="mailRegistration" value="<?= !empty($_POST['mailRegistration']) ? $_POST['mailRegistration'] : NULL ?>" />
            </div>
            <div class="grid-x grid-padding-x align-center">                    
                <p class="error"><?= isset($formError['mailRegistration']) ? $formError['mailRegistration'] : NULL ?></p>
            </div>
            <!-- Sexe -->
            <div class="grid-x grid-padding-x align-center">            
                <label for="genderRegistration">Sexe : </label>
                <label for="man">Homme</label><input type="radio" id="man" name="genderRegistration" value="1" />
                <label for="women">Femme</label><input type="radio" id="women" name="genderRegistration" value="2" />
            </div>
            <div class="grid-x grid-padding-x align-center">
                <p class="error"><?= isset($formError['genderRegistration']) ? $formError['genderRegistration'] : NULL ?></p>
            </div>
            <!-- Pays -->
            <div class="grid-x grid-padding-x align-center">            
                <label class="large-2" for="countrysRegistration">Votre pays : </label>
                <select class="large-4" name="countrysRegistration">
                    <?php foreach ($countrysSelect as $countryList)
                    {
                        ?>
                        <option value="<?= $countryList->id ?>"><?= $countryList->country ?></option>
<?php } ?>
                </select>
            </div>
            <div class="grid-x grid-padding-x align-center">
                <p class="error"><?= isset($formError['countrysRegistration']) ? $formError['countrysRegistration'] : NULL ?></p>
            </div>
            <!-- Mot de passe -->
            <div class="grid-x grid-padding-x align-center">            
                <label class="large-2" for="passwordRegistration">Mot de passe : </label>
                <input class="large-4" type="password" id="password" name="passwordRegistration" value="" />
            </div>
            <div class="grid-x grid-padding-x align-center">
                <p class="error"><?= isset($formError['passwordRegistration']) ? $formError['passwordRegistration'] : NULL ?></p>
            </div>
            <div class="grid-x grid-padding-x align-center">           
                <label class="large-3" for="confirmPassword">Confirmation du mot de passe : </label>
                <input class="large-3" type="password" id="confirmPassword" name="confirmPassword" value="" />
            </div>
            <div class="grid-x grid-padding-x align-center">
                <p class="error"><?= isset($formError['confirmPassword']) ? $formError['confirmPassword'] : NULL ?></p>
            </div>
            <div class="grid-x grid-padding-x align-center">            
                <input class="hollow button" type="submit" name="addSubmit" value="Terminer" />
            </div>
        </form>
    </div>
</div>