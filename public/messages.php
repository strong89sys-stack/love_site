<?php
session_start();
require 'config.php';

$couple_id = $_SESSION['couple_id'] ?? 1; // par défaut couple 1

$stmt = $conn->prepare("SELECT u.username, u.sexe, m.message, m.    created_at
                        FROM messages as m, utilisateur as u
                        WHERE m.user_id = u.user_id
                        AND u.couple_id = :couple_id
                        ORDER BY m.created_at ASC");
$stmt->bindParam(":couple_id", $couple_id, PDO::PARAM_INT);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $class = ($_SESSION['username'] === $row['username']) 
              ? 'send' 
              : ($row['sexe'] === 'M' ? 'receive-male' : 'receive-female');
    echo "
        <li class='$class'>".htmlspecialchars($row['message'])."</li>
        <span class='created_at $class'>".
            date("d/m H:i", strtotime($row['created_at']))
        ."</span>
    ";
}
