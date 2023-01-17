Skip to content
Search or jump to…
Pull requests
Issues
Codespaces
Marketplace
Explore
 
@LeGrosGaT 
arthurAucl
/
projet_infra_S7
Private
Fork your own copy of arthurAucl/projet_infra_S7
Code
Issues
Pull requests
Actions
Projects
Security
Insights
projet_infra_S7/data/www/index.php /
@arthurAucl
arthurAucl affichage nouvelle db
Latest commit 99228c5 21 minutes ago
 History
 1 contributor
82 lines (66 sloc)  2.25 KB

<!DOCTYPE html>
<html>
<head>
<title>Exemple</title>
</head>
<body>

<?php
$host = '192.168.56.81';
$user = 'css';
$password = 'csspass';
$dbname = 'RDV_DATABASE';

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM salle";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   // output data of each row
   echo "Table : Salle <br>";
   while($row = mysqli_fetch_assoc($result)) {
      //echo "id: " . $row["id"]. " - Entry: " . $row["entry"]. "<br>";
      echo "id: " . $row["id"]. " - Nom de la salle: " . $row["nom"]. " - Batiment: " . $row["batiment"]. " - Numero: " . $row["numero"]. " - Disponible: " . $row["disponible"]."<br>";
      
   }
} else {
   echo "0 results";
}

$sql = "SELECT * FROM utilisateurs";
$result = mysqli_query($conn, $sql); 
 
if (mysqli_num_rows($result) > 0) {
   // output data of each row
   echo "<br> Table : Utilisateurs <br>";
   while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - Nom: " . $row["nom"]. " - Prenom: " . $row["prenom"]. " - Email: " . $row["email"].  " - Mot de passe: " . $row["motDePasse"].  " - Situation: " . $row["etat"]."<br>";
   }
} else {
   echo "0 results";
}

$sql = "SELECT * FROM materiels";
$result = mysqli_query($conn, $sql); 
 
if (mysqli_num_rows($result) > 0) {
   // output data of each row
   echo "<br> Table : Materiels <br>";
   while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - nomDuMateriel: " . $row["nomDuMateriel"]. " - photo: " . $row["photo"]. " - prix: " . $row["prix"]. " - qualite: " . $row["qualite"].  " - disponible: " . $row["disponible"]."<br>";
   }
} else {
   echo "0 results";
}

$sql = "SELECT * FROM rdv";
$result = mysqli_query($conn, $sql); 
 
if (mysqli_num_rows($result) > 0) {
   // output data of each row
   echo "<br> Table : Rendez-vous <br>";
   while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - date: " . $row["date"]. " - durée: " . $row["duree"]. " - description: " . $row["description"]. " - etat: " . $row["etat"].  " - salle: " . $row["salle"]."<br>";
   }
} else {
   echo "0 results";
}

mysqli_close($conn);
?>


</body>

</html>
Footer
© 2023 GitHub, Inc.
Footer navigation
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
arthurAucl/projet_infra_S7