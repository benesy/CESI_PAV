<?php
$title = "Edition des Agents";
ob_start();
?>
Agent - Edition

<?php if (isset($validate) && $validate){?>
    Agent mis à jour.
    
    <button type="submit" href="?page=editionagent">Retour</button>

<?php } else if (isset($agentList)){?>
    <form action="?page=editionagent" method="post">
        <select name="id">
        <?php 
        foreach ($agentList as $agent){
            echo '<option value="'.$agent->get_id().'">'.$agent->get_login()." ".$agent->get_nom()." ".$agent->get_prenom().'</option>';
        } ?>
        </select>
</form>
<?php } else { ?>
    
    
    <form action="?page=editionagent" method="post">
        <div>
            <label for="nom"> Nom</label>
            <input type="text" id="nom" name="nom" require value="<?= $agent->get_nom()?>">
        </div>
        <div>
            <label for="prenom"> Prénom</label>
            <input type="text" id="prenom" name="prenom" require value="<?= $agent->get_prenom()?>">
        </div>
        <div>
            <label for="login"> Login</label>
            <input type="text" id="login" name="login" require value="<?= $agent->get_login()?>">
        </div>
        <div>
            <label for="password"> Mot de passe</label>
            <input type="password" id="password" name="password" require >
            <input type="hidden" id="id" name="id" require value="<?= $agent->get_id()?>">
        </div>
        
        <button type="submit">Envoi</button>
    </form>
<?php } ?>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>