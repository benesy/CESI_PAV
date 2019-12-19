<?php
$title = "PAV - Tournée";
ob_start();
?>

<?php if (isset($validate) && $validate){?>
    Pav supprimé.
    
    <a href="?page=supprpav"><input type="button" value="retour"></a>

<?php } else if (isset($pavList)) { ?>
    <form action="?page=supprpav" method="post">
    <div class="form-group">    
    <select name="id" class="form-control">
        <?php 
        foreach ($pavList as $pav){
            echo '<option value="'.$pav->get_id().'">'.$pav->get_numero()." ".$pav->get_adresse()." ".$pav->get_code_postal()." ".$pav->get_ville().'</option>';
        } ?>
        </select>
        <button type="submit" class="btn btn-primary" href="?page=supprpav">Supprimer</button>
    </div>
</form>
<?php }  ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>