<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", "On");
ini_set("display_startup_errors", "On");


$infoBdd = [
    "server" => "192.168.56.81",
    "login" => "css",
    "password" => "csspass",
    "db_name" => "RDV_DATABASE",
];

$mysqli = new mysqli(
    $infoBdd["server"],
    $infoBdd["login"],
    $infoBdd["password"],
    $infoBdd["db_name"]
);

if ($mysqli->connect_errno) {
    exit("Problème de connexion à la BDD");
}


if (!empty($_GET["logout"])) {
    unset($_SESSION["compte"]);
    header("Location: ./");
}

?>