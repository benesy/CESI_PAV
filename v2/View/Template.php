<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="PAV" content="gestionnaire de taux de remplissage de PAV" />
        <title><?= $title ?></title>
    </head>
    <body>
        <?php
            if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])){
                ?>
                    <div>
                        Bienvenue <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> !
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
                echo "<nav><ul>".$menu."</ul></nav>";
            if (isset($content))
                echo $content;
        ?>
    </body>
</html>