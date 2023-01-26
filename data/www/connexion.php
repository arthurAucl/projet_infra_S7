<?php 
include 'core.php';

if(isset($_POST['connexion_submit']) && $_POST['connexion_submit'] == 1){
    //	if($_POST['connexion_submit'] == 1){ //on détecte que l’action vient du bouton de la connexion equivalent de la ligne 18
    if($_POST['password'] && $_POST['mail']){
        //$_SESSION['compte'] = true;
        $mail_escaped = $mysqli->real_escape_string(trim($_POST['mail']));
        $password_escaped = $mysqli->real_escape_string(trim($_POST['password']));

        $sql = "SELECT id_user FROM Utilisateurs
        WHERE email = '".$mail_escaped."' AND motDePasse = '".$password_escaped."'";

        $result = $mysqli->query($sql);
        if (!$result) {
            exit($mysqli->error);
        }

        $nb = $result->num_rows;
        if ($nb) {
        //récupération de l’id de l’étudiant
            $row = $result->fetch_assoc();
            $_SESSION['compte'] = $row['idEtu'];
            $_INFO = "OK";
            header('Location: /login.php');
        } else $_INFO = "ERR : LOGIN MDP incorrect";
    } else  $_INFO = "ERR : LOGIN et/OU mdp vide";
//}
}

?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <link rel="stylesheet" href="connexion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <header>
        <div class="en-tête">
            <img src="Logo ESEO png.png">
            <h1><?php echo $_INFO ?></h1>
        </div>
    </header>

    <!-- IF NOT CONNECTED -->
    <body>
        <div class="container">            
            <h1>Connectez-vous</h1>
            <form class="row needs-validation" novalidate>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Adresse ESEO</span>
                    <input id="adresse" type="text" class="form-control" placeholder="adresse" name="mail" required>
                    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                        <option value="1">@reseau.eseo.fr</option>
                        <option value="2">@eseo.fr</option>
                      </select>
                    <div class="invalid-feedback">
                        Adresse incorrecte.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Mot de passe</span>
                    <input id="mdp" type="password" class="form-control" placeholder="mdp" name="password" required>
                    <div class="invalid-feedback">
                        Mot de passe incorrecte.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <button name="connexion_submit" type="submit" class="btn btn-primary">Connexion</button>
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

</html>
