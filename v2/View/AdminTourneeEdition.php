<?php
$title = "PAV - Tournée";
ob_start();
?>
Tournée - Edition

<?php if (isset($validate) && $validate){?>
    Tournée éditée.
    
    <div>
    <a href="?page=editiontournee"><input type="button" value="retour"></a>
</div>

    <?php } else if (isset($tourneeList)){;
?>
        <div>
        <form action="?page=editiontournee" method="post">
        <select name="id">
        <?php
        
        foreach ($tourneeList as $tournee){

            echo '<option value="'.$tournee->get_id().'">'.$tournee->get_id()." - ".$tournee->get_date()."</option>";
        } ?>
        </select>
        <button type="submit">Editer</button>
    </div>    
    </form>

    <?php } else if (isset($tournee) && isset($currentAgent) && isset($pavList) && isset($pavTourneeList)) {?>
     
     
        <div>
        <form action="?page=editiontournee" method="post">
        
        <input type="hidden" id="id" name="id" require value="<?= $tournee->get_id()?>">

        <label for="date"> Date de la Tournée</label>
        <input type="date" id="date" name="date" value ="<?=$tournee->get_date() ?>">
<?php         var_dump($agentList);
        echo "-----";
?>        
        <select name="id_agent">
        <?php 
        foreach ($agentList as $agent){
            if ($currentAgent->get_id() == $agent->get_id())
            echo '<option value="'.$agent->get_id().'" selected>'.$agent->get_login()." ".$agent->get_nom()." ".$agent->get_prenom().'</option>';
            else 
            echo '<option value="'.$agent->get_id().'">'.$agent->get_login()." ".$agent->get_nom()." ".$agent->get_prenom().'</option>';
        } ?>
        </select>
        <button type="submit" href="?page=editiontournee">Modifier</button>
</form>
    </div>
     
     
     
        <div>
        <form action="?page=editiontournee" method="post">
    
        <select name="id_pav">
        <?php 
        foreach ($pavList as $pav){
            echo '<option value="'.$pav->get_id().'">'.$pav->get_numero()." ".$pav->get_adresse()." ".$pav->get_code_postal()." ".$pav->get_ville()."</option>";
        } ?>
        </select>
        <button type="submit">Ajouter à la tournée</button>
    </div>


   
    


<?php } ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>