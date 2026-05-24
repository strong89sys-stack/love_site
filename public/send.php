<?php
session_start();
require 'config.php'; // connexion MySQL avec $conn = new mysqli(...)

$user_id = $_SESSION['user_id'] ?? null;
$msg = $_POST['msg'] ?? '';

if ($user_id && !empty($msg)) {
    $stmt = $conn->prepare("INSERT INTO messages (message, created_at, user_id) VALUES (:message, NOW(), :user_id);");

    $stmt->bindParam(":message", $msg, PDO::PARAM_STR);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();
} else {
    echo "Erreur: utilisateur ou message manquant.";
}
?>