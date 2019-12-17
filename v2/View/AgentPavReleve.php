<?php
$title = "PAV - Relevé";
$menu = '<li><a href="?page=disconnect">Deconnection</a></li>';
ob_start();
?>

<?php
$content = $content . ob_get_contents();
ob_clean();
?>