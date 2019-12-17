<?php
$title = "PAV - Création";
ob_start();
?>

<?php if (isset($validate) && $validate){?>
    Nouveau Pav crée.
    
    <a href="?page=creationpav"><input type="button" value="retour"></a>

<?php } else {?>
    <form action="?page=creationpav" method="post">
        <div>
            <label for="numero"> Numero</label>
            <input type="text" id="numero" name="numero" require>
        </div>
        <div>
            <label for="adresse"> Adresse/label>
            <input type="text" id="adresse" name="adresse" require>
        </div>
        <div>
            <label for="codepostal"> Code postal</label>
            <input type="text" id="codepostal" name="codepostal" require>
        </div>
        <div>
            <label for="ville"> Ville</label>
            <input type="text" id="ville" name="ville" require>
        </div>
        
        <button type="submit">Envoi</button>
    </form>
<?php } ?>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>