<?php
$title = "PAV - Edition";
ob_start();
?>

<?php if (isset($validate) && $validate){?>
    Pav mis à jour.
    
    <a href="?page=editionpav"><input type="button" value="retour"></a>

<?php } else if (isset($pavList)){?>
    <form action="?page=editionpav" method="post">
        <select name="id">
        <?php 
        foreach ($pavList as $pav){
            echo '<option value="'.$pav->get_id().'">'.$pav->get_login()." ".$pav->get_nom()." ".$pav->get_prenom().'</option>';
        } ?>
        </select>
        <button type="submit" href="?page=editionpav">Editer</button>
</form>
<?php } else { ?>
    
    
    <form action="?page=editionpav" method="post">
        <div>
            <label for="numero"> Numero</label>
            <input type="text" id="numero" name="numero" require value="<?= $pav->get_numero()?>">
        </div>
        <div>
            <label for="adresse"> Adresse</label>
            <input type="text" id="adresse" name="adresse" require value="<?= $pav->get_adresse()?>">
        </div>
        <div>
            <label for="codepostal"> Code postal</label>
            <input type="text" id="codepostal" name="codepostal" require value="<?= $pav->get_code_postal()?>">
        </div>
        <div>
            <label for="ville"> Ville</label>
            <input type="text" id="ville" name="ville" require value="<?= $pav->get_ville()?>">
            <input type="hidden" id="id" name="id" require value="<?= $pav->get_id()?>">
        </div>
        
        <button type="submit">Envoi</button>
    </form>
<?php } ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>