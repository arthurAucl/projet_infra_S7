<?php
include "core.php";
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <link href="fontawesome-free-6.2.1-web/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <body>
        <header>
            <img src="Logo ESEO png.png">
        </header>

    <!-- IF NOT CONNECTED -->
        <div class="container">
            
            <div>
                <a class="btn btn-secondary" href="index.php"><i class="fa-solid fa-arrow-left-long"></i> Retour au menu</a>    
                <a class="btn btn-primary" href="nouveauRdv.php"><b> Nouveau Rendez-vous</b></a>
            </div>

            <!-- les emprunts en attente -->

            <!-- En attente -->
            <div class="card">
                <div class="card-header">
                    <span class="align-middle">A venir</span>
                    <button type="button" class="btn"><i class="fa-solid fa-ban"></i></button>
                </div>
                <div class="card-body">
                    <p> Date : 21 décembre 2022 </p>
                    <p> Horaire : 13h00     Durée : 20 minutes </p>
                    <p> Professeur : M. BEAUDOUX </p>
                    <p> Motif : Mise au point sur la note du dernier projet réalisé </p>
                </div>
            </div>

            <!-- A confirmer -->
            <div class="card">
                <div class="card-header">
                    <span class="align-middle">A confirmer</span>
                    <button type="button" class="btn"><i class="fa-regular fa-circle-check"></i></button>
                    <button type="button" class="btn"><i class="fa-regular fa-circle-xmark"></i></button>
                </div>
                <div class="card-body">
                    <p> Date : 21 décembre 2022 </p>
                    <p> Horaire : 13h00     Durée : 20 minutes </p>
                    <p> Professeur : M. BEAUDOUX </p>
                    <p> Motif : Mise au point sur la note du dernier projet réalisé </p>
                </div>
            </div>

             <!-- les emprunt en cours ne peuvent pas être modifier ou annulé -->
            <div class="card">
                <div class="card-header">
                    <span class="align-middle">A venir</span>
                    <button type="button" class="btn"><i class="fa-solid fa-ban"></i></button> 
                    <button type="button" class="btn"><i class="fa-solid fa-gear"></i></button>
                </div>
                <div class="card-body">
                    <p> Date : 21 décembre 2022 </p>
                    <p> Horaire : 13h00     Durée : 20 minutes </p>
                    <p> Professeur : M. BEAUDOUX </p>
                    <p> Motif : Mise au point sur la note du dernier projet réalisé </p>
                </div>
            </div>

            <!-- les emprunts expirés sont en gris et on ne peux que les supprimer (retirer de la page) -->
            <div class="card">
                <div class="card-header">
                    <!-- Il faut différencier supprimer et retirer un rdv/emprunt -->
                    <span class="align-middle">Expirée</span>
                    <button type="button" class="btn"><i class="fa-solid fa-trash"></i></i></button>
                </div>
                <div class="card-body">
                    <p> Date : 21 décembre 2022 </p>
                    <p> Horaire : 13h00     Durée : 20 minutes </p>
                    <p> Professeur : M. BEAUDOUX </p>
                    <p> Motif : Mise au point sur la note du dernier projet réalisé </p>
                </div>
            </div>
        </div>

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

    </body>

</html>
