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

$sql = "SELECT * FROM Salle";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   // output data of each row
   echo "Table : Salle <br>";
   while($row = mysqli_fetch_assoc($result)) {
      //echo "id: " . $row["id"]. " - Entry: " . $row["entry"]. "<br>";
      echo "id: " . $row["id"]. " - Nom de la salle: " . $row["nomDeLaSalle"]. " - Batiment: " . $row["batiment"]. " - Numero: " . $row["numero"]. " - Disponible: " . $row["disponible"]."<br>";
      
   }
} else {
   echo "0 results";
}

$sql = "SELECT * FROM Utilisateurs";
$result = mysqli_query($conn, $sql); 
 
if (mysqli_num_rows($result) > 0) {
   // output data of each row
   echo "<br> Table : Utilisateurs <br>";
   while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - ID de l'utilisateur: " . $row["id_user"]. " - Nom: " . $row["nom"]. " - Prenom: " . $row["prenom"]. " - Email: " . $row["email"].  " - Mot de passe: " . $row["motDePasse"].  " - Situation: " . $row["etat"]."<br>";
   }
} else {
   echo "0 results";
}

$sql = "SELECT * FROM Materiels";
$result = mysqli_query($conn, $sql); 
 
if (mysqli_num_rows($result) > 0) {
   // output data of each row
   echo "<br> Table : Materiels <br>";
   while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - nomDuMateriel: " . $row["nomDuMateriel"]. " - description_materiel: " . $row["description_materiel"]. " - qualiteAvantLePret: " . $row["qualiteAvantLePret"]. " - qualiteApresLePret: " . $row["qualiteApresLePret"].  " - prix: " . $row["prix"].  " - dateAttribution: " . $row["dateAttribution"]. " - dateRestitution: " . $row["dateRestitution"]."<br>";
   }
} else {
   echo "0 results";
}

$sql = "SELECT * FROM RDV";
$result = mysqli_query($conn, $sql); 
 
if (mysqli_num_rows($result) > 0) {
   // output data of each row
   echo "<br> Table : Rendez-vous <br>";
   while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - id_rdv: " . $row["id_rdv"]. " - description_rdv: " . $row["description_rdv"]. " - salle_id: " . $row["salle_id"]. " - utilisateurDemande_id: " . $row["utilisateurDemande_id"].  " - utilisateurSollicite_id: " . $row["utilisateurSollicite_id"].  " - dateEtHeure: " . $row["dateEtHeure"]. " - duree: " . $row["duree"]."<br>";
   }
} else {
   echo "0 results";
}

mysqli_close($conn);
?>


</body>

</html>