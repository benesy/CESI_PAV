<?php
$title = "PAV Agent";
ob_start();
?>
<h3>Agent - Creation</h3>
<?php if (isset($validate) && $validate){?>
    Nouvel agent crée.
    
    <a href="?page=creationagent"><input type="button" value="retour"></a>

<?php } else {?>
    <form action="?page=creationagent" method="post">
        <div>
            <label for="nom"> Nom</label>
            <input type="text" id="nom" name="nom" require>
        </div>
        <div>
            <label for="prenom"> Prénom</label>
            <input type="text" id="prenom" name="prenom" require>
        </div>
        <div>
            <label for="login"> Login</label>
            <input type="text" id="login" name="login" require>
        </div>
        <div>
            <label for="password"> Mot de passe</label>
            <input type="password" id="password" name="password" require>
        </div>
        
        <button type="submit">Envoi</button>
    </form>
<?php } ?>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>