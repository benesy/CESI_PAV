<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="PAV" content="gestionnaire de taux de remplissage de PAV" />
        <title><?= $title ?></title>
    </head>
    <body>
        <?php
            if (isset($menu))
                echo $menu;
            if (isset($content))
                echo $content;
        ?>
    </body>
</html>