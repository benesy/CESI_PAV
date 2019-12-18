<?php
$title = "PAV - Tournée";
$menu = '<li><a href="?page=disconnect">Deconnection</a></li>';
ob_start();
?>
<table>
<?php if (isset($noTournee)){
echo "Pas de tournée prevue aujourd'hui";
} else {
    foreach ($releveList as $releve){
        foreach ($pavList as $pav){
            if($releveList->get_id_pav() == $pav->get_id()){
                ?> <tr>
                    <td><?= $releve->get_id() ?></td>
                    <td><?= $pav->get_numero()." ". $pav->get_addresse()." ".$pav->get_code_postal()." ".$pav->get_ville()?></td>
                    <td>Relever</td>
                </tr><?php
            }
        }
    } 
?>
</table>


Agent liste pav
<?php
$content = $content . ob_get_contents();
ob_clean();
?>