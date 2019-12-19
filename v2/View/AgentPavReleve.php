<?php
$title = "PAV - Relevé";
$menu = '<li><a href="?page=disconnect">Deconnection</a></li>';
ob_start();
?>
<h2>Agent relevé pav</h2>
<div>
    <form action="?page=pavreleve" method="post">
        <input type="hidden" name ="id" value="<?= $releve->get_id() ?>">
        <input type="hidden" name ="status" value="<?= $releve->get_status() ?>">
        <input type="hidden" name ="date" value="<?= date("Y-m-d") ?>">
        <div>
        <label for="niveau">Niveau</label>
        <select id="niveau" name="niveau">
            <option <?php if($releve->get_niveau() == 0) echo "selected"; ?> value="0">0/4</option>
            <option <?php if($releve->get_niveau() == 1) echo "selected"; ?> value="1">1/4</option>
            <option <?php if($releve->get_niveau() == 2) echo "selected"; ?> value="2">2/4</option>
            <option <?php if($releve->get_niveau() == 3) echo "selected"; ?> value="3">3/4</option>
            <option <?php if($releve->get_niveau() == 4) echo "selected"; ?> value="4">4/4</option>
        </select>
        </div>
        <div>
            <label for="commentaire">Commentaire</label>
        <input type="text" id="commentaire" name="commentaire" value="<?= $releve->get_commentaire() ?>">
        </div>
        <button type="submit">Valider</button>
    </form>
</div>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>