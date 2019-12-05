<?php ob_start();
    $url = "#";
    ?>
<div>
    <a href= <?= $url ?> >Gestion Comptes admin</a>
</div>

<?php
    $menu =$menu. ob_get_contents(); 
    ob_clean();
?>