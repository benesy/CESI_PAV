<?php ob_start(); ?>
<li>
    <a href="?page=global">Vue Globale</a>
</li>
<li>
    <a href="#">Agent</a>
    <div>
        <a href="?page=creationagent">Création</a>
        <a href="?page=editionagent">Edition</a>
        <a href="?page=suppragent">Supression</a>
    </div>
</li>
<li>
    <a href="#">PAV</a>
    <div>
        <a href="?page=creationpav">Création</a>
        <a href="?page=editionpav">Edition</a>
        <a href="?page=supprpav">Supression</a>
    </div>
</li>
<li>
    <a href="#">Tournée</a>
    <div>
        <a href="?page=creationtournee">Création</a>
        <a href="?page=editiontournee">Edition</a>
        <a href="?page=supprtournee">Supression</a>
    </div>
</li>
<li>
    <a href="?page=disconnect">Deconnection</a>
</li>

<?php
$menu = ob_get_contents();
ob_clean();
?>