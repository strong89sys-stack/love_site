<?php
session_start();
require 'config.php';

$couple_id = $_SESSION['couple_id'] ?? 1; // par défaut couple 1

$stmt = $conn->prepare("SELECT u.username, u.sexe, m.message, m.created_at
                        FROM messages m
                        JOIN utilisateur u ON m.user_id = u.id
                        WHERE u.couple_id = ?
                        ORDER BY m.created_at ASC");
$stmt->bind_param("i", $couple_id);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $class = (isset($_SESSION['username']) === $row['username']) 
              ? 'send' 
              : ($row['sexe'] === 'h' ? 'receive-male' : 'receive-female');
    echo "<li class='$class'><strong>".htmlspecialchars($row['username']).":</strong> ".htmlspecialchars($row['message'])."</li>";
}
