<?php
$title = "PAV - Connexion";
ob_start();
?>
<div class="row">
    <div class="col"></div>
    <div class="col" style="margin-top:50px;">
        <form action="#" method="post">
            <div class="form-group">
                <label for="login"> Login</label>
                <input type="text" class="form-control" id="log" name="login" value="<?php if (isset($connectionLogin)) echo $connectionLogin; ?>">
            </div>
            <div class="form-group">
                <label for="pwd"> Mot de passe</label>
                <input class="form-control" type="password" id="password" name="pwd">
            </div>
            <?php
            if (isset($erreurPwd) && $erreurPwd)
                echo "<span>Login ou mdp incorrect</span>"
                ?>
            <button class="btn btn-primary" type="submit">Connexion</button>
        </form>
    </div>
    <div class="col"></div>
</div>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>