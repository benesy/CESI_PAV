<?php
$title = "PAV - Tournée";
ob_start();
?>

<?php if (isset($validate) && $validate) { ?>
    Tournée supprimé.

    <a href="?page=supprtournee"><input type="button" value="retour"></a>

<?php } else if (isset($tourneeList)) { ?>
    <div class="row" style="margin-top:20px;">
        <div class="col"></div>
        <div class="col">
            <form action="?page=supprtournee" method="post">
                <div class="form-group">
                    <select name="id" class="form-control">
                        <?php
                            foreach ($tourneeList as $tournee) {
                                echo '<option value="' . $tournee->get_id() . '">' . $tournee->get_id() . " " . $tournee->get_date() . '</option>';
                            } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" href="?page=supprtournee">Supprimer</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
<?php }  ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>