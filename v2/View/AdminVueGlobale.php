<?php
$title = "PAV - Tournée";
ob_start();
?>
Vue globale
<?php if (isset($pavList)){?>
<table>
<tr>
    <th>Id Pav</th>
    <th>Date Dernier Relevé</th>
    <th>Niveau</th>
    <th>Commentaire Postal</th>
    <th>Numero</th>
    <th>Adresse</th>
    <th>CP</th>
    <th>Ville</th>
</tr>
<?php 
if ($pavList != false) {
foreach ($pavList as $pav) {
 echo '<tr>';
echo '<td>'.$pav['id'] . '</td>';
echo '<td>'.$pav['date'] . '</td>';
echo '<td>'.$pav['niveau'] . '</td>';
echo '<td>'.$pav['commentaire'] . '</td>';
echo '<td>'.$pav['numero'] . '</td>';
echo '<td>'.$pav['adresse'] . '</td>';
echo '<td>'.$pav['code_postal'] . '</td>';
echo '<td>'.$pav['ville'] . '</td>';

echo '</tr>';
}
}
?>
    </table>
<?php
}
?>
<?php
$content = $content . ob_get_contents();
ob_clean();
?>