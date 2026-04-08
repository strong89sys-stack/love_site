<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérifier que les champs ne sont pas vides
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("Location: index.php?message=empty");
        exit();
    }

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Préparer la requête
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Vérifier le mot de passe en clair
        if ($user['password'] === $password) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username']  = $user['username'];
            $_SESSION['couple_id'] = $user['couple_id'];
            
            header("Location: primary.php?message=yes");
            exit();
        } else {
            header("Location: index.php?message=wrong_password");
            exit();
        }
    } else {
        header("Location: index.php?message=user_not_found");
        exit();
    }
}
?>