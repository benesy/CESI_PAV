<?php ob_start(); ?>
<li>
    <a href="?page=pavlist">Tournée du jour</a>
</li>
<li>
    <a href="?page=disconnect">Deconnection</a>
</li>

<?php
$menu = ob_get_contents();
ob_clean();
?>