<?php
$title = "PAV - Tournée";
ob_start();
?>

<?php if (isset($validate) && $validate) { ?>
    Tournée éditée.
    <div>
        <a href="?page=editiontournee"><input type="button" value="retour"></a>
    </div>

<?php } else if (isset($tourneeList)) {;
    ?>
    <div class="row" style="margin-top:20px;">
        <div class="col"></div>
        <div class="col">
            <form action="?page=editiontournee" method="post">
                <select class="form-control" name="id">
                    <?php
                        foreach ($tourneeList as $tournee) {
                            echo '<option value="' . $tournee->get_id() . '">' . $tournee->get_id() . " - " . $tournee->get_date() . "</option>";
                        } ?>
                </select>
                <button class="btn btn-primary" type="submit">Editer</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
<?php } else if (isset($tournee) && isset($currentAgent) && isset($pavList) && isset($pavTourneeList)) { ?>
    <div class="row" style="margin-top:20px;">
        <div class="col"></div>
        <div class="col">
            <div>
                <form action="?page=editiontournee" method="post">
                    <input type="hidden" id="id" name="id" require value="<?= $tournee->get_id() ?>">
                    <label for="date"> Date de la Tournée</label>
                    <input class="form-control" type="date" id="date" name="date" value="<?= $tournee->get_date() ?>">
                    <br>
                    <select class="form-control" name="id_agent">
                        <?php
                            foreach ($agentList as $agent) {
                                if ($currentAgent->get_id() == $agent->get_id())
                                    echo '<option value="' . $agent->get_id() . '" selected>' . $agent->get_login() . " " . $agent->get_nom() . " " . $agent->get_prenom() . '</option>';
                                else
                                    echo '<option value="' . $agent->get_id() . '">' . $agent->get_login() . " " . $agent->get_nom() . " " . $agent->get_prenom() . '</option>';
                            } ?>
                    </select>
                    <button class="btn btn-primary" type="submit" href="?page=editiontournee">Modifier</button>
                </form>
            </div>
            <div>
                <form action="?page=editiontournee" method="post">
                    <select class="form-control" name="id_pav">
                        <?php
                            foreach ($pavList as $pav) {
                                echo '<option value="' . $pav->get_id() . '">' . $pav->get_numero() . " " . $pav->get_adresse() . " " . $pav->get_code_postal() . " " . $pav->get_ville() . "</option>";
                            } ?>
                    </select>
                    <input type="hidden" id="id" name="id" require value="<?= $tournee->get_id() ?>">
                    <button class="btn btn-primary" type="submit">Ajouter à la tournée</button>
            </div>
            <table class="table table-striped">
                <tr>
                    <th scope="col">Id Pav</th>
                    <th scope="col">Numero voie</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Code Postal</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Suppression</th>
                </tr>
                <?php
                    foreach ($pavTourneeList as $pav) {
                        echo '<tr>';
                        echo '<td>' . $pav->get_id() . '</td>';
                        echo '<td>' . $pav->get_numero() . '</td>';
                        echo '<td>' . $pav->get_adresse() . '</td>';
                        echo '<td>' . $pav->get_code_postal() . '</td>';
                        echo '<td>' . $pav->get_ville() . '</td>';
                        $lien = "?page=editiontournee&id_tournee=" . $tournee->get_id() . "&id_pav=" . $pav->get_id();
                        echo '<td><a href="' . $lien . '">Suppression</a></td>';
                        echo '</tr>';
                    } ?>
            </table>
        </div>
        <div class="col"></div>
    </div>
<?php } ?>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>