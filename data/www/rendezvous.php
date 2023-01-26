<?php
include "core.php";

$idUtilisateur = $db->real_escape_string($_SESSION['id']);

if (isset($_GET['cancel'])) {
    $id = $db->real_escape_string($_GET['cancel']);
    $query = "DELETE FROM acours WHERE rdv = '$id';";
    $db->query($query);
    $query = "DELETE FROM rdv WHERE id = '$id';";
    $db->query($query);
}

if (isset($_GET['confirmation'])) {

    $id = $db->real_escape_string($_GET['confirmation']);
    $query = "UPDATE rdv SET etat = 'ACCEPTE' WHERE id = '$id';";
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

    <body>
        <header>
            <img src="Logo ESEO png.png">
        </header>

        <div class="container">
            
            <div>
                <a class="btn btn-secondary" href="index.php"><i class="fa-solid fa-arrow-left-long"></i> Retour au menu</a>    
                <a class="btn btn-primary" href="nouveauRdv.php"><b> Nouveau Rendez-vous</b></a>
            </div>

            <!-- les emprunts en attente -->

           <?php 
            $result = $db->query("SELECT etat, date, rdv AS rdv_id FROM acours INNER JOIN rdv ON rdv.id = acours.rdv WHERE acours.utilisateurs = '$idUtilisateur' ORDER BY etat, date;");

            while($row = $result->fetch_array(MYSQLI_ASSOC)) { 
                $idRdv = $row["rdv_id"];
                $resultRdv = $db->query("SELECT prenom, nom, date, duree, description, rdv.id AS rdv_id FROM acours INNER JOIN utilisateurs ON acours.utilisateurs = utilisateurs.id INNER JOIN rdv ON acours.rdv = rdv.id WHERE acours.rdv = '$idRdv' AND acours.utilisateurs != '$idUtilisateur' ORDER BY date DESC");
                $rowRdv = $resultRdv->fetch_array(MYSQLI_ASSOC);
                ?>

                <div class="card">
                <div class="card-header">
                    <?php
                    $date_actuelle = date("Y-m-d H:i:s"); // date actuelle

                    if ($date_actuelle < $rowRdv["date"]) { ?>
                        <?php 
                            if($row['etat'] == 'ACCEPTE'){?>
                            <span class="align-middle">A venir</span>
                            <?php } else if($row['etat'] == 'EN ATTENTE') { 
                                if($_SESSION['etat'] == 'ETUDIANT') {?>
                                <span class="align-middle">En attente de confirmation</span>
                                <a class="btn" href="?cancel=<?php echo $rowRdv['rdv_id'] ?>"><i class="fa-solid fa-ban"></i></a>
                            <?php } else { ?>
                                <span class="align-middle">Confirmation nécéssaire</span>
                                <a class="btn" href="?confirmation=<?php echo $rowRdv['rdv_id'] ?>"><i class="fa-regular fa-circle-check"></i></a>
                                <a class="btn" href="?cancel=<?php echo $rowRdv['rdv_id'] ?>"><i class="fa-regular fa-circle-xmark"></i></a>
                            <?php } } else if($row['etat'] == 'REFUSE') { ?>   
                                <span class="align-middle">Refusé</span>
                            <?php } else if($row['etat'] == 'ACCEPTE'){ ?>
                            <span class="align-middle">A venir</span>
                        <?php } ?>
                    <?php } else { ?>
                        <span class="align-middle">Expiré</span>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <p> Date et heure : <?php echo $rowRdv["date"] ?> </p>
                    <p> Durée : <?php echo $rowRdv["duree"] ?> minutes </p>
                    <p> Participant : <?php echo $rowRdv["prenom"].' '.$rowRdv["nom"] ?> </p>
                    <p> Motif : <?php echo $rowRdv["description"] ?> </p>
                </div>
            </div>

            <?php
            }
            $result->free();
            $db->close();
            ?>
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