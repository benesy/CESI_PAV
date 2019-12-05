<?php ob_start();
    $url = "#";
    ?>
<div>
    <a href= <?= $url ?> >Gestion PAV</a>
</div>
<div>
    <a href=<?= $url ?> >Gestion Tournés</a>
</div>
<div>
    <a href="index.php?page=gcomptes" >Gestion Comptes</a>
</div>
<?php
    $menu =$menu. ob_get_contents(); 
    ob_clean();
?>