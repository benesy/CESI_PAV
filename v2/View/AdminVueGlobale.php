<?php
$title = "PAV - Tournée";
ob_start();
?>
Vue globale
<?php if (isset($pavList){?>
<table>
<tr>
    <th>Id Pav</th>
    <th>Numero voie</th>
    <th>Adresse</th>
    <th>Code Postal</th>
    <th>Ville</th>
    <th>Niveau de remplissage</th>
    <th>Commentaire</th>
</tr>
<?php 
foreach ($pavList as $pav) {
 echo '<tr>';
echo '<td>'.$pav->get_id() . '</td>';
echo '<td>'.$pav->get_date() . '</td>';
echo '<td>'.$pav->get_id_agent() . '</td>';
echo '<td>'.$pav->get_code_postal() . '</td>';
echo '<td>'.$pav->get_ville() . '</td>';
echo '<td>'.$pav->get_niveau() . '</td>';
echo '<td>'.$pav->get_commentaire() . '</td>';


echo '</tr>';
}
?>
    </table>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>