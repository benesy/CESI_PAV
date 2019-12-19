<?php
$title = "PAV - Edition";
ob_start();
?>


<?php if (isset($validate) && $validate) { ?>
    Pav mis à jour.

    <a href="?page=editionpav"><input type="button" value="retour"></a>

<?php } else if (isset($pavList)) { ?>
    <div class="row" style="margin-top:20px;">
        <div class="col"></div>
        <div class="col">
            <form action="?page=editionpav" method="post">
                <select class="form-control" name="id">
                    <?php
                        foreach ($pavList as $pav) {
                            echo '<option value="' . $pav->get_id() . '">' . $pav->get_numero() . " " . $pav->get_adresse() . " " . $pav->get_code_postal() . " " . $pav->get_ville() . "</option>";
                        } ?>
                </select>
                <button type="submit" class="btn btn-primary" href="?page=editionpav">Editer</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form action="?page=editionpav" method="post">
                <div class="form-group">
                    <label for="numero"> Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" require value="<?= $pav->get_numero() ?>">
                </div>
                <div>
                    <label for="adresse"> Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" require value="<?= $pav->get_adresse() ?>">
                </div>
                <div>
                    <label for="code_postal"> Code postal</label>
                    <input type="text" class="form-control" id="codepostal" name="code_postal" require value="<?= $pav->get_code_postal() ?>">
                </div>
                <div>
                    <label for="ville"> Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville" require value="<?= $pav->get_ville() ?>">
                    <input type="hidden" id="id" name="id" require value="<?= $pav->get_id() ?>">
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