<?php

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $email = $_POST['emailNom'] . $_POST['emailDomaine'];
    $motDePasse = $_POST['motDePasse'];

    // Connecter à la base de données
    $infoBdd = [
        "server" => "192.168.56.81",
        "login" => "css",
        "password" => "csspass",
        "db_name" => "RDV_DATABASE",
    ];
    
    $db = new mysqli(
        $infoBdd["server"],
        $infoBdd["login"],
        $infoBdd["password"],
        $infoBdd["db_name"]
    );

    //$db = new mysqli('host', 'username', 'password', 'database_name');

    // Vérifier si les données de connexion sont valides
    $query = "SELECT * FROM utilisateurs WHERE email='$email' AND motDePasse='$motDePasse'";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        // Démarrer une session
        session_start();
        // Enregistrer l'utilisateur en tant qu'étant connecté
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email;
        // Rediriger vers la page protégée
        header('Location: index.php');
        exit;
    } else {
        // Afficher un message d'erreur
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}?>

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

<?php if($_SESSION['logged_in'] == true){ ?>

<p>Connecté</p>

<?php } else { ?>

    <body>
        <div class="container">            
            <h1>Connectez-vous</h1>
            <form class="row needs-validation" novalidate method="post" action="">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Adresse ESEO</span>
                    <input id="emailNom" type="text" class="form-control" placeholder="adresse" name="emailNom" required>
                    <select class="form-select" name="emailDomaine" id="inputGroupSelect03" aria-label="Example select with button addon">
                        <option value="@reseau.eseo.fr">@reseau.eseo.fr</option>
                        <option value="@eseo.fr">@eseo.fr</option>
                      </select>
                    <div class="invalid-feedback">
                        Adresse incorrecte.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Mot de passe</span>
                    <input id="motDePasse" type="password" class="form-control" placeholder="mdp" name="motDePasse" required>
                    <div class="invalid-feedback">
                        Mot de passe incorrecte.
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input name="submit" type="submit" class="btn btn-primary" value="Connexion">
                </div>
            </form>
        </div>
    </body>

<?php } ?>

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