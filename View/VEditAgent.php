<?php 
    ob_start();
?>
<div>
    <?php
        if (isset($sousMenu) && $sousMenu == "admGestionCompte")
            {
                ?> 
                <div>
                    <ul>
                        <li><a href="index.php?page=gcomptes&action=creation" >Création</a></li>
                        <li><a href="index.php?page=gcomptes&action=edit" >Modifier</a></li>
                    </ul>
                </div>
                <?php
            }
?>
<div>
    <h3><?= $soutitre ?></h3>
</div>
<div>
    <form action="index.php?page=gcomptes&action=edit" method="post">
        <select name="loginEdit" size="1">
            <?= $agentList ?>
        </select>
        <input type="submit" value="Supprimer" name="suppr">
        <input type="submit" value="Editer" name="edit">
    </form>
</div>
<?php
    $content = $content.ob_get_contents(); 
    ob_clean();
?>