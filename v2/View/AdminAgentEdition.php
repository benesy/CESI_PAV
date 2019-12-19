<?php
$title = "PAV Agent";
ob_start();
?>


<?php if (isset($validate) && $validate){?>
    Agent mis à jour.
    
    <a href="?page=editionagent"><input type="button" value="retour"></a>

<?php } else if (isset($agentList)){?>
    <form action="?page=editionagent" method="post">
    <div class="form-group">    
    <select class="form-control" name="id">
        <?php 
        foreach ($agentList as $agent){
            echo '<option value="'.$agent->get_id().'">'.$agent->get_login()." ".$agent->get_nom()." ".$agent->get_prenom().'</option>';
        } ?>
        </select>
    </div>
        <button class="btn btn-primary" type="submit" href="?page=editionagent">Editer</button>
</form>
<?php } else { ?>
    
    
    <form action="?page=editionagent" method="post">
        <div class="form-group">
            <label for="nom"> Nom</label>
            <input class="form-control" type="text" id="nom" name="nom" require value="<?= $agent->get_nom()?>">
        </div>
        <div class="form-group">
            <label for="prenom"> Prénom</label>
            <input class="form-control" type="text" id="prenom" name="prenom" require value="<?= $agent->get_prenom()?>">
        </div>
        <div class="form-group">
            <label for="login"> Login</label>
            <input class="form-control" type="text" id="login" name="login" require value="<?= $agent->get_login()?>">
        </div>
        <div class="form-group">
            <label for="password"> Mot de passe</label>
            <input class="form-control" type="password" id="password" name="password" require >
            <input type="hidden" id="id" name="id" require value="<?= $agent->get_id()?>">
        </div>
        
        <button class="btn btn-primary" type="submit">Envoi</button>
    </form>
<?php } ?>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>