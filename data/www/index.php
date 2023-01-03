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

$sql = "SELECT * FROM entries";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
       echo "Salle: " . $row["Salle"]. " - Utilisateurs: " . $row["Utilisateurs"]. " - Materiels: " . $row["Materiels"]. " - RDV: " . $row["RDV"]. "<br>";
   }
} else {
   echo "0 results";
}

mysqli_close($conn);
?>


</body>

</html>