<div id="homeTeam" class="">
    <!-- Accueil ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <h4>Dernieres publications</h4>
        <?php if (isset($memberTeamRight) && $memberTeamRight == 1) { ?>
            <div class="grid-x align-center">
                <form action="#" method="POST" class="large-11">
                    <label for="">Publier un article : <textarea></textarea></label>
                    <select name="">
                        <option value=""></option>
                        <?php foreach ($vartype as $list) { ?>
                        <option value=""></option>

                        <?php } ?>
                    </select>
                    <input type="submit" name="" value="Publier" />
                </form>
            </div>
        <?php } ?>
</div>