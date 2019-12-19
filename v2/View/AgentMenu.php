<?php ob_start(); ?>
<li class="nav-item">
    <a class="nav-link" href="?page=pavlist">Tournée du jour</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="?page=disconnect">Deconnection</a>
</li>

<?php
$menu = ob_get_contents();
ob_clean();
?>