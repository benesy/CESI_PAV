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
    <form action="#" method="post">
        <div>
            <label for="login"> Login</label>
            <input type="text" id="log" name="login" required>
        </div>
        <div>
            <label for="pwd"> Mot de passe</label>
            <input type="password" id="password" name="pwd" required>
        </div>
        <div>
            <label for="nom"> Nom</label>
            <input type="text" id="nom" name="nom">
        </div>
        <div>
            <label for="firstname"> Prénom</label>
            <input type="text" id="firstname" name="firstname">
        </div>
        <button type="submit">Ajouter</button>
    </form>
</div>
<div>
    <?php
        if (isset($valiation) && $validation != "")
        {
            ?>
                Nouvelle entrée enregistrée.
            <?php
        }

    ?>
</div>
<?php
    $content = $content.ob_get_contents(); 
    ob_clean();
?>