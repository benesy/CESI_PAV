<!DOCTYPE html>
<html lang="fr" style="height:100%;">

<head>
    <meta charset="utf-8" />
    <meta name="PAV" content="gestionnaire de taux de remplissage de PAV" />
    <title><?= $title ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="background:#DCDCDC; height:100%;">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="container" style="min-height:100%; height:100%; background:white;">
        <div class="col">
            <?php
            if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {
                ?>
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    Bienvenue <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> !
                </nav>
            <?php
            } else if (isset($_SESSION['user'])) {
                ?>
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    Bienvenue <?= $_SESSION['user'] ?> !
                </nav>
            <?php
            }
            if (isset($menu))
                echo "<nav><ul class='nav nav-tabs' style='background-color: #e3f2fd;'>" . $menu . "</ul></nav>";
            if (isset($content))
                echo $content;
            ?>
        </div>
    </div>
</body>

</html>