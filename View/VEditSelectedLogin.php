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
            <label for="loginEdit"> Login</label>
            <input type="text" id="log" name="loginEdit" value="<?= $vuser ?>" readonly>
        </div>
        <div>
            <label for="pwd"> Mot de passe (Optionnel)</label>
            <input type="password" id="password" name="pwd">
        </div>
        <div>
            <label for="firstName"> Prenom</label>
            <input type="text" id="firstName" name="firstName" value="<?= $vfirstname ?>" required>
        </div>
        <div>
            <label for="lastName">Nom</label>
            <input type="text" id="lastName" name="lastName" value="<?= $vlastname ?>" required>
        </div>
        <button type="submit" value="Editer" name="edit">Modifier</button>
    </form>
</div>
<div>
    <?php
        if (isset($validation) && $validation == 1)
                echo "Nouvelle entrée enregistrée";
        else if (isset($validation) && $validation == 2)
                echo "Erreur";
    ?>
</div>
<?php
    $content = $content.ob_get_contents(); 
    ob_clean();
?>