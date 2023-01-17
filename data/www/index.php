<?php
include "core.php";
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <link rel="stylesheet" href="menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <header>
        <div class="en-tête">
            <img src="Logo ESEO png.png">
        </div>
    </header>

    <!-- IF NOT CONNECTED -->
    <body>
        <div class="container">
            <a class="btn btn-primary btn-lg" href="rendezvous.php"><b> Gérer mes rendez-vous </b></a>
            <a class="btn btn-primary btn-lg" href="emprunt.php"><b> Gérer mes emprunts </b></a>
            <a class="btn btn-secondary btn-lg" href="?logout"><b> Déconnexion </b></a>
        </div>
    </body>

    <footer>
        <div class="bottom">
            <p class="sign"> Site réalisé par ADAMCZUK Etienne, AUCLAIR Arthur, BAFFOU Augustin
                BAHLOUL Ismaïl, LHOMMEDET Constance, MIGNOT Sixtine
            </p>
        </div>
        <div class="rights">
            <p class="rights">® All rights reserved </p>
        </div>
    </footer>

</html>
