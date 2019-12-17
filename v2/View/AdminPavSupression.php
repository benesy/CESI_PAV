<?php
$title = "PAV - Tournée";
ob_start();
?>

<?php if (isset($validate) && $validate){?>
    Pav supprimé.
    
    <a href="?page=supprpav"><input type="button" value="retour"></a>

<?php } else if (isset($pavList)) { ?>
    <form action="?page=supprpav" method="post">
        <select name="id">
        <?php 
        foreach ($pavList as $pav){
            echo '<option value="'.$pav->get_numero().'">'.$pav->get_adresse()." ".$pav->get_code_postal()." ".$pav->get_ville().'</option>';
        } ?>
        </select>
        <button type="submit" href="?page=supprpav">Supprimer</button>
        
</form>
<?php }  ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>