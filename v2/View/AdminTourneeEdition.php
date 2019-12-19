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
<br>
    <?php } else if (isset($tournee) && isset($currentAgent) && isset($pavList) && isset($pavTourneeList)) {?>
     
     
        <div>
        <form action="?page=editiontournee" method="post">
        
        <input type="hidden" id="id" name="id" require value="<?= $tournee->get_id()?>">

        <label for="date"> Date de la Tournée</label>
        <input type="date" id="date" name="date" value ="<?=$tournee->get_date() ?>">
 <br>
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
     <br>
     
<div>

</div>


     
        <div>
        <form action="?page=editiontournee" method="post">
    
        <select name="id_pav">
        <?php 
        foreach ($pavList as $pav){
            echo '<option value="'.$pav->get_id().'">'.$pav->get_numero()." ".$pav->get_adresse()." ".$pav->get_code_postal()." ".$pav->get_ville()."</option>";
        } ?>
        </select>
        <input type="hidden" id="id" name="id" require value="<?= $tournee->get_id()?>">
        <button type="submit">Ajouter à la tournée</button>
    </div>
<br>

<table class="table table-striped">

<tr>
    <th>Id Pav</th>
    <th>Numero voie</th>
    <th>Adresse</th>
    <th>Code Postal</th>
    <th>Ville</th>
    <th>Suppression</th>
</tr>
<?php 
foreach ($pavTourneeList as $pav) {
 echo '<tr>';
echo '<td>'.$pav->get_id() . '</td>';
echo '<td>'.$pav->get_numero() . '</td>';
echo '<td>'.$pav->get_adresse() . '</td>';
echo '<td>'.$pav->get_code_postal() . '</td>';
echo '<td>'.$pav->get_ville() . '</td>';
$lien = "?page=editiontournee&id_tournee=".$tournee->get_id() . "&id_pav=".$pav->get_id();
echo '<td><a href="'.$lien.'">Suppression</a></td>';

echo '</tr>';
}
?>
    </table>


    


<?php } ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>