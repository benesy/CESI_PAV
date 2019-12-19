<?php
$title = "PAV - Agent";
ob_start();
?>

<?php if (isset($validate) && $validate) { ?>
    Agent supprimé.

    <a href="?page=suppragent"><input type="button" value="retour"></a>

<?php } else if (isset($agentList)) { ?>
    <div class="row" style="margin-top:20px;">
        <div class="col"></div>
        <div class="col">
            <form action="?page=suppragent" method="post">
                <div class="form-group">
                    <select class="form-control" name="id">
                        <?php
                            foreach ($agentList as $agent) {
                                echo '<option value="' . $agent->get_id() . '">' . $agent->get_login() . " " . $agent->get_nom() . " " . $agent->get_prenom() . '</option>';
                            } ?>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit" href="?page=editionagent">Supprimer</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
<?php }  ?>




<?php
$content = $content . ob_get_contents();
ob_clean();
?>