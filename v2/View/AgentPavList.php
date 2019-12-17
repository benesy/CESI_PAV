<?php
$title = "PAV - Tournée";
$menu = '<li><a href="?page=disconnect">Deconnection</a></li>';
ob_start();
?>
Agent liste pav
<?php
$content = $content . ob_get_contents();
ob_clean();
?>