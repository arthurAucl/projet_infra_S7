<?php
include "core.php";

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $prof = $db->real_escape_string($_POST['prof']);
    $date = $db->real_escape_string($_POST['dateheure']);
    $duree = $db->real_escape_string($_POST['duree']);
    $description = $db->real_escape_string($_POST['description']);
    $salle = $db->real_escape_string($_POST['salle']);

    if($_SESSION['etat'] == 'ETUDIANT'){
        $query1 = "INSERT INTO rdv (date, duree, description, etat, salle) VALUES ('$date', '$duree', '$description', 'EN ATTENTE', '$salle');";
    } else {
        $query1 = "INSERT INTO rdv (date, duree, description, etat, salle) VALUES ('$date', '$duree', '$description', 'ACCEPTE', '$salle');";
    }
    
    $db->query($query1);

    $query2 = "SELECT id FROM rdv ORDER BY id DESC LIMIT 1;";
    $result = $db->query($query2);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $idRdv = $db->real_escape_string($row['id']);
    $idUtilisateur = $db->real_escape_string($_SESSION['id']);

    $query3 = "INSERT INTO acours (utilisateurs, rdv) VALUES ('$idUtilisateur', '$idRdv');";
    $query4 = "INSERT INTO acours (utilisateurs, rdv) VALUES ('$prof', '$idRdv');";

    $db->query($query3);

    if($db->query($query4)){
        header("Location: rendezvous.php");
    }
    else {
        echo "Echec lors de l'ajout de la donnée : (" . $db->errno . ") " . $db->error;
    }
    

    $db->close();
}?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/634d48256a.js" crossorigin="anonymous"></script>

    <header>
        <div class="en-tête">
            <img src="Logo ESEO png.png">
        </div>
    </header>

    <!-- IF NOT CONNECTED -->
    <body>
        <div class="container-sm">
            <h1>Nouveau Rendez-vous</h1>
            <form class="row needs-validation" novalidate method="post">
                <div class="Sinput-group mb-3">
                    <a class="btn btn-secondary" href="rendezvous.php"><i class="fa-solid fa-arrow-left-long"></i> Retour aux rendez-vous</a>
                </div>

                <div class="input-group mb-3">
                        <?php 
                        if($_SESSION['etat'] == 'ETUDIANT'){
                            $result = $db->query("SELECT * FROM utilisateurs WHERE etat = 'PROFESSEUR_ADMINISTRATEUR' OR etat = 'PROFESSEUR'");
                            ?>
                            <label class="input-group-text" id="basic-addon1">Professeur</label>
                            <select class="form-select" aria-label="Default select example" name="prof" id="prof" required>
                            <option selected disabled value="">Selectionnez un professeur</option>
                            <?php
                        } else {
                            ?>
                            <label class="input-group-text" id="basic-addon1">Etudiant</label>
                            <select class="form-select" aria-label="Default select example" name="prof" id="prof" required>
                            <option selected disabled value="">Selectionnez un étudiant</option>
                            <?php
                            $result = $db->query("SELECT * FROM utilisateurs WHERE etat = 'ETUDIANT'");
                        }
                        
                        while($row = $result->fetch_array(MYSQLI_ASSOC)) { 
                            ?>
                        <option value="<?php echo $row['id'] ?>"> <?php echo $row['prenom'].' '.$row['nom'] ?> </option>
                        
                        <?php
                        }
                        ?>

                    </select>
                    <div class="invalid-feedback">
                        Vous devez d'abord selectionner la personne avec qui prendre le rendez-vous.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" id="basic-addon1">Salle</label>
                    <select class="form-select" aria-label="Default select example" name="salle" id="salle" required>
                        <option selected disabled value="">Selectionnez une salle</option>
                        <?php 
                        $result = $db->query("SELECT * FROM salle");

                        while($row = $result->fetch_array(MYSQLI_ASSOC)) { 
                            ?>
                        <option value="<?php echo $row['id'] ?>"> <?php echo "(".$row['batiment'].$row['numero'].") ".$row['nom'] ?> </option>
                        
                        <?php
                        }
                        ?>

                    </select>
                    <div class="invalid-feedback">
                        Vous devez d'abord selectionner votre salle.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Date et heure</span>
                    <input id="dateheure" name="dateheure" type="datetime-local" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                        Cette personne n'est pas disponible à ce moment, essayez une autre date ou une autre heure.
                    </div>
                </div>
            
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Durée du rendez-vous</span>
                    <select name="duree" id="duree" class="form-select" aria-label="Default select example" required>
                        <option selected disabled value="">Selectionnez une durée</option>
                        <option value="5">5m</option>
                        <option value="10">10m</option>
                        <option value="15">15m</option>
                        <option value="30">30m</option>
                        <option value="60">1h</option>
                        <option value="90">1h30</option>
                        <option value="120">2h</option>
                    </select>
                    <div class="invalid-feedback">
                        Vous devez selectionner une durée.
                    </div>
                </div>
                            
                <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea id="description" name="description" class="form-control" aria-label="With textarea" required></textarea>
                    <div class="invalid-feedback">
                        Vous devez entrer une description pour que la personne à qui vous demandez le rendez-vous sâche le motif du rendez-vous.
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">En cochant cette case, je m'engage à assister au rendez-vous.</label>
                    <div class="invalid-feedback">
                        Vous devez accepter cette condition.
                    </div>
                </div>

                <div class="input-group">
                    <input name="submit" type="submit" class="btn btn-primary" value="Ajouter">
                </div>
                
            </form>
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

    <script> (() => {
        'use strict'
      
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')
      
        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
          form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
      
            form.classList.add('was-validated')
          }, false)
        })
      })()
    </script>

</html>

<?php   
$result->free();
$db->close();
?>
