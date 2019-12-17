<?php
$title = "PAV - Tournée";
ob_start();
?>
Vue globale
<?php
$content = $content . ob_get_contents();
ob_clean();
?>