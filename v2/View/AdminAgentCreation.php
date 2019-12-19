<?php
$title = "PAV Agent";
ob_start();
?>

<?php if (isset($validate) && $validate){?>
    Nouvel agent crée.
    
    <a href="?page=creationagent"><input type="button" value="retour"></a>

<?php } else {?>
    <form action="?page=creationagent" method="post">
        <div class="form-group">
            <label for="nom"> Nom</label>
            <input class="form-control" type="text" id="nom" name="nom" require>
        </div>
        <div class="form-group">
            <label for="prenom"> Prénom</label>
            <input class="form-control" type="text" id="prenom" name="prenom" require>
        </div>
        <div class="form-group">
            <label for="login"> Login</label>
            <input class="form-control" type="text" id="login" name="login" require>
        </div>
        <div class="form-group">
            <label for="password"> Mot de passe</label>
            <input class="form-control" type="password" id="password" name="password" require>
        </div>
        
        <button class="btn btn-primary" type="submit">Envoi</button>
    </form>
<?php } ?>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>