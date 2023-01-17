<?php
include "core.php";
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <link href="fontawesome-free-6.2.1-web/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <header>
        <h1>Gestionnaire de rendez-vous et d'emprunt</h1>
        <img src="Logo ESEO png.png">
    </header>

    <!-- IF NOT CONNECTED -->
    <body>
        <div class="container">  
            
            <div class="input-group mb-3 d-flex p-2">
                <a class="btn btn-secondary" href="index.php"><i class="fa-solid fa-arrow-left-long"></i> Retour au menu</a>
            </div>
            
            <div class="input-group mb-3">
                <a class="btn btn-primary" href="nouvelEmprunt.php"><b> Nouvel emprunt </b></a>
            </div>

            <!-- les emprunts en attente -->

            <!-- Avant le début de la date de l'emprunt, l'utilisateur peur annuler l'emprunt -->
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <p>A venir <button type="button" class="btn"><i class="fa-solid fa-ban"></i></button></p>
                </div>
                <div class="card-body">
                    <p> Nom : Câble HDMI </p>
                    <p> Stock : 5 restants </p>
                    <p> Date d'emprunt : 3/12/2022 </p>
                    <p> Date de restitution : 17/12/2022 </p>
                </div>
            </div>

             <!-- les emprunt en cours ne peuvent pas être modifier ou annulé -->
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <p> En cours <button type="button" class="btn"><i class="fa-solid fa-ban"></i></button> <button type="button" class="btn"><i class="fa-solid fa-gear"></i></button></p>
                </div>
                <div class="card-body">
                    <p> Nom : Câble HDMI </p>
                    <p> Stock : 5 restants </p>
                    <p> Date d'emprunt : 3/12/2022 </p>
                    <p> Date de restitution : 17/12/2022 </p>
                </div>
            </div>

            <!-- les emprunts expirés sont en gris et on ne peux que les supprimer (retirer de la page) -->
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <!-- Il faut différencier supprimer et retirer un rdv/emprunt -->
                    <p> Expirée <button type="button" class="btn"><i class="fa-solid fa-trash"></i></i></button> </p>
                </div>
                <div class="card-body">
                    <p> Nom : Câble HDMI </p>
                    <p> Stock : 5 restants </p>
                    <p> Date d'emprunt : 3/12/2022 </p>
                    <p> Date de restitution : 17/12/2022 </p>
                </div>
            </div>
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
