<?php
$title = "PAV - Agent";
ob_start();
?>

<?php if (isset($validate) && $validate){?>
    Agent supprimé.
    
    <a href="?page=suppragent"><input type="button" value="retour"></a>

<?php } else if (isset($agentList)) { ?>
    <form action="?page=suppragent" method="post">
        <select name="id">
        <?php 
        foreach ($agentList as $agent){
            echo '<option value="'.$agent->get_id().'">'.$agent->get_login()." ".$agent->get_nom()." ".$agent->get_prenom().'</option>';
        } ?>
        </select>
        <button type="submit" href="?page=editionagent">Supprimer</button>
        
</form>
<?php }  ?>
    
    
   

<?php
$content = $content . ob_get_contents();
ob_clean();
?>