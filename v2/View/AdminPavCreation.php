<?php
$title = "PAV - Création";
ob_start();
?>
PAV - Creation
<?php
$content = $content . ob_get_contents();
ob_clean();
?>