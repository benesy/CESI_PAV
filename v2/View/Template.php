<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="PAV" content="gestionnaire de taux de remplissage de PAV" />
        <title><?= $title ?></title>
    </head>
    <body>
        <?php
            if (isset($_SESSION['firstName']) && isset($_SESSION['lastName']) && !empty($_SESSION['firstName'])){
                ?>
                    <div>
                        Bienvenue <?= $_SESSION['firstName'] ?> <?= $_SESSION['lastName'] ?> !
                         ( <a href="?page=deconnect">Deconnexion</a> )
                    </div>
                <?php
            }
            else if (isset($_SESSION['user'])){
                ?>
                    <div>
                       Bienvenue <?= $_SESSION['user'] ?> !
                    </div>
                <?php
            }
            if (isset($menu))
                echo $menu;
            if (isset($content))
                echo $content;
        ?>
    </body>
</html>