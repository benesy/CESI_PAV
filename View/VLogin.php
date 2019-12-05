<?php
$title = "PAV - Connexion";
ob_start();
?>
<div>
    <form action="#" method="post">
        <div>
            <label for="login"> Login</label>
            <input type="text" id="log" name="login" value="<?= $connectionLogin ?>">
        </div>
        <div>
            <label for="pwd"> Mot de passe</label>
            <input type="password" id="password" name="pwd">
        <?php 
            if ($erreurPwd)
                echo "<span>Login ou mdp incorrect</span>" 
        ?>
        </div>
        <button type="submit">Connexion</button>
    </form>
</div>
<?php 
$content = $content.ob_get_contents();
ob_clean();
?>