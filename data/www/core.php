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

$db = new mysqli(
    $infoBdd["server"],
    $infoBdd["login"],
    $infoBdd["password"],
    $infoBdd["db_name"]
);

if ($db->connect_errno) {
    exit("Problème de connexion à la BDD");
}

$current_file = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    if ($current_file != 'login.php') {
        header("Location: login.php");
        exit;
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>