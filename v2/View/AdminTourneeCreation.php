<?php
$title = "PAV - Tournée";
ob_start();
?>

<?php if (isset($validate) && $validate){?>
    Nouvelle tournée créée.
    
    <div>
    <form action="?page=editiontournee" method="post">
    <button type="submit"> Editer la tournée"</button>
        <input type="hidden" id="id" name="id" require value="<?= $tournee->get_id()?>">
    </form>
</div>

    <?php } else if (isset($agentList)){?>
        <div>
        <form action="?page=creationtournee" method="post">
        <label for="id_agent">Agent affecté : </label>
        <select name="id_agent">
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