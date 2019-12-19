<?php
$title = "PAV - Création";
ob_start();
?>

<?php if (isset($validate) && $validate){?>
    Nouveau Pav crée.
    
    <a href="?page=creationpav"><input type="button" value="retour"></a>

<?php } else {?>
    <form action="?page=creationpav" method="post">
        <div class="form-group">
            <label for="numero"> Numero</label>
            <input type="text" class="form-control" id="numero" name="numero" require>
        </div>
        <div>
            <label for="adresse"> Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" require>
        </div>
        <div>
            <label for="code_postal"> Code postal</label>
            <input type="text" class="form-control" id="codepostal" name="code_postal" require>
        </div>
        <div>
            <label for="ville"> Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" require>
        </div>
        
        <button type="submit" class="btn btn-primary">Envoi</button>
    </form>
<?php } ?>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>