<?php
$title = "PAV - Tournée";
ob_start();
?>
Tournée - Suppression

<?php if (isset($validate) && $validate){?>
    Tournée supprimé.
    
    <a href="?page=supprtournee"><input type="button" value="retour"></a>

<?php } else if (isset($tourneeList)) { ?>
    <form action="?page=supprtournee" method="post">
        <div class="form-group"> 
    <select name="id" class="form-control">
        <?php 
        foreach ($tourneeList as $tournee){
            echo '<option value="'.$tournee->get_id().'">'.$tournee->get_id()." ".$tournee->get_date().'</option>';
        } ?>
        </select>
        <button type="submit" class="btn btn-primary" href="?page=supprtournee">Supprimer</button>
        
</form>
<?php }  ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>