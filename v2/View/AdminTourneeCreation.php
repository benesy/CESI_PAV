<?php
$title = "PAV - Tournée";
ob_start();
?>

<?php if (isset($validate) && $validate){?>
    Nouvelle tournée créée.
    
    <form action="?page=editionTournee" method="post">
    <button type="submit"> Editer la tournée"</button>
        <input type="hidden" id="id" name="id" require value="<?= $tournee->get_id()?>">
    </form>

    <?php } else if (isset($agentList)){?>
    <form action="?page=creationTournee" method="post">
    <div>
        <select name="id">
        <?php 
        foreach ($agentList as $agent){
            echo '<option value="'.$agent->get_id().'">'.$agent->get_nom()." ".$agent->get_prenom()."</option>";
        } ?>
        </select>
    </div>    
    
    <div>
            <label for="date"> Date de la Tournée</label>
            <input type="date" id="date" name="date" required>
        </div>
        
        
        
        <button type="submit">Envoi</button>
    </form>
<?php } ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>