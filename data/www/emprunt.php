<?php
include "core.php";

$idUtilisateur = $db->real_escape_string($_SESSION['id']);

if (isset($_GET['cancel'])) {
    $id = $db->real_escape_string($_GET['cancel']);
    $query = "DELETE FROM emprunt WHERE id = '$id';";
    $db->query($query);
}
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <link href="fontawesome-free-6.2.1-web/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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

           <?php 
            $result = $db->query("SELECT dateattribution, daterestitution, nomdumateriel, emprunt.id AS emprunt_id FROM emprunt INNER JOIN materiels ON emprunt.materiels = materiels.id WHERE utilisateurs = '$idUtilisateur' ORDER BY dateattribution DESC;");

            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                ?>
                <div class="card">
                <div class="card-header">
                <?php
                $date_actuelle = date("Y-m-d H:i:s"); // date actuelle

                if ($date_actuelle < $row["dateattribution"]) { ?>
                    <span class="align-middle">A venir</span>
                    <a class="btn" href="?cancel=<?php echo $row['emprunt_id'] ?>"><i class="fa-solid fa-ban"></i></a>
                <?php } else {
                    if ($date_actuelle < $row["daterestitution"]) {?>
                    <span class="align-middle">En cours</span>
                    <?php } else { ?>
                    <span class="align-middle">Terminé, en attente de vérification par l'administration.</span>    
                    <?php }
                } ?>
                    
                </div>
                <div class="card-body">
                    <p> Date d'attribution : <?php echo $row["dateattribution"] ?> </p>
                    <p> Date de restitution : <?php echo $row["daterestitution"] ?> </p>
                    <p> Matériel : <?php echo $row["nomdumateriel"] ?> </p>
                </div>
            </div>

            <?php
            }
            $result->free();
            $db->close();
            ?>

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
