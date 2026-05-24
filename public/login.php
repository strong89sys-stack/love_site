<?php
session_start();
require 'config.php';

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$submit = $_POST['submit'] ?? null;


if (isset($submit)) {
    // Vérifier que les champs ne sont pas vides
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("Location: index.php?message=empty");
        exit();
    }
    else{
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Préparer la requête
        $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE username = :username LIMIT 1;");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($res) {
            // Vérifier le mot de passe en clair
            if ($res['passwd'] === $password) {
                $_SESSION['user_id'] = $res['user_id'];
                $_SESSION['username']  = $res['username'];
                $_SESSION['couple_id'] = $res['couple_id'];
                
                header("Location: primary.php?message=yes");
                exit();
            }
            else {
                header("Location: index.php?message=wrong_password");
                exit();
            }
        }
        else {
            header("Location: index.php?message=user_not_found");
            exit();
        }
    }
}
?>