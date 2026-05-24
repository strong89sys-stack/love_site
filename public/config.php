<?php
$host = "localhost";
$dbname = "love_story";
$user = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch(PDOException $e){
    echo "Erreur de connexion à la base de données : ".$e->getMessage();
}

?>