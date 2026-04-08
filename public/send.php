<?php
session_start();
require 'config.php'; // connexion MySQL avec $conn = new mysqli(...)

$user_id = $_SESSION['user_id'] ?? null;
$msg = $_POST['msg'] ?? '';

if ($user_id && !empty($msg)) {
    $stmt = $conn->prepare("INSERT INTO messages (user_id, message, created_at) VALUES (?, ?, NOW())");
    $stmt->bind_param("is", $user_id, $msg);
    if (!$stmt->execute()) {
        // Debug en cas d’erreur
        echo "Erreur SQL: " . $stmt->error;
    }
} else {
    echo "Erreur: utilisateur ou message manquant.";
}
