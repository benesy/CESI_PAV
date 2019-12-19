<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="PAV" content="gestionnaire de taux de remplissage de PAV" />
        <title><?= $title ?></title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <?php
            if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])){
                ?>
                    <div>
                        Bienvenue <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> !
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