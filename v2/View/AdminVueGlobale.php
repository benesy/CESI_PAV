<?php
$title = "PAV - Tournée";
ob_start();
?>
Vue globale
<?php if (isset($pavList)){?>
<table class="table table-striped">
<tr>
    <th scope="col">Id Pav</th>
    <th scope="col">Date Dernier Relevé</th>
    <th scope="col">Niveau</th>
    <th scope="col">Commentaire</th>
    <th scope="col">Numero</th>
    <th scope="col">Adresse</th>
    <th scope="col">CP</th>
    <th scope="col">Ville</th>
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