<?php
$title = "PAV - Tournée";
$menu = '<li><a href="?page=disconnect">Deconnection</a></li>';
ob_start();
?>

<?php if (isset($noTournee)){
echo "Pas de tournée prevue aujourd'hui.";
} else {?>
    <table>
    <tr>
        <th>Status</th>
        <th>Numero relevé</th>
        <th>Adresse</th>
        <th>Relever</th>
    </tr><?php
        foreach ($releveList as $releve) {
            foreach ($pavList as $pav) {
                if ($releve->get_id_pav() == $pav->get_id()) {
                    $link = "?page=pavreleve&id_releve=" . $releve->get_id();
                    ?> <tr>
                        <td><?php
                                            if ($releve->get_status() == 's')
                                                echo '<span style="color:lime;">Relevé';
                                            else
                                                echo '<span style="color:orange;">En attente';
                                            ?></span>
                        </td>
                        <td><?= $releve->get_id() ?></td>
                        <td><?= $pav->get_numero() . " " . $pav->get_adresse() . " " . $pav->get_code_postal() . " " . $pav->get_ville() ?></td>
                        <td><a href="<?= $link ?>">Relever</a></td>
                    </tr><?php
                                        }
                                    }
                                }
                                ?>
</table>
<?php } ?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>