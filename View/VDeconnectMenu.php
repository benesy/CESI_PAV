<?php ob_start();
    $url = "index.php?page=deconnection";
    ?>
<div>
    <a href=<?= $url ?> >Deconnection</a>
</div>
<?php
    $menu =$menu. ob_get_contents(); 
    ob_clean();
?>