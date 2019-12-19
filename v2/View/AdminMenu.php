<?php ob_start(); ?>
<li class="nav-item">
    <a class="nav-link" href="?page=global">Vue Globale</a>
</li>
<li class="nav-item">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Agent</a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="?page=creationagent">Création</a>
        <a class="dropdown-item" href="?page=editionagent">Edition</a>
        <a class="dropdown-item" href="?page=suppragent">Supression</a>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">PAV</a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="?page=creationpav">Création</a>
        <a class="dropdown-item" href="?page=editionpav">Edition</a>
        <a class="dropdown-item" href="?page=supprpav">Supression</a>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tournée</a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="?page=creationtournee">Création</a>
        <a class="dropdown-item" href="?page=editiontournee">Edition</a>
        <a class="dropdown-item" href="?page=supprtournee">Supression</a>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="?page=disconnect">Deconnection</a>
</li>

<?php
$menu = ob_get_contents();
ob_clean();
?>