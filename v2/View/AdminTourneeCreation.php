<?php
$title = "PAV - Tournée";
ob_start();
?>

<?php if (isset($validate) && $validate) { ?>
    Nouvelle tournée créée.

    <div class="row" style="margin-top:20px;">
        <div class="col"></div>
        <div class="col">
            <form action="?page=editiontournee" method="post">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Editer la tournée"</button>
                    <input type="hidden" class="form-control" id="id" name="id" require value="<?= $tournee->get_id() ?>">
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
<?php } else if (isset($agentList)) { ?>
    <div class="row" style="margin-top:20px;">
        <div class="col"></div>
        <div class="col">
            <form action="?page=creationtournee" method="post">
                <div class="form-group">
                    <label for="id_agent">Agent affecté : </label>
                    <select name="id_agent" class="form-control">
                        <?php
                            foreach ($agentList as $agent) {
                                echo '<option value="' . $agent->get_id() . '">' . $agent->get_nom() . " " . $agent->get_prenom() . "</option>";
                            } ?>
                    </select>
                </div>

                <div>
                    <label for="date"> Date de la Tournée</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <button type="submit" class="btn btn-primary">Envoi</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
<?php } ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>