<?php
$title = "PAV - Création";
$menu = '<li><a href="?page=disconnect">Deconnection</a></li>';
ob_start();
?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>