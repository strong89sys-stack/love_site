<?php
    session_start();
    require 'config.php'; // connexion MySQL

    // Récupérer les messages
    $stmt = $conn->prepare("SELECT u.username, u.sexe, m.message, m.created_at 
            FROM messages AS m, utilisateur AS u 
            WHERE m.user_id = u.user_id 
            ORDER BY m.created_at ASC"
        );
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr" style="height: 100vh;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>message_page</title>
    <link rel="stylesheet" href="static/style.css">
</head>

<body style="height: 100vh;">
    <header class="header">
        <div class="heart"><img src="content/ico/heart.png" alt="heart"></div>
        <div class="header-title">NOTRE ESPACE</div>
        <div class="heart"><img src="content/ico/heart.png" alt="heart"></div>
    </header>

    <div class='container-chat'>
        <ul id="messages">
            <!--<li class="receive">Me too❤️</li>
            <li class="send">I make a special website</li>
-->
            <?php foreach($messages as $msg): ?>
                <?php
                    $class = ($_SESSION['username'] === $msg['username']) 
                        ? 'send' 
                        : ($msg['sexe'] === 'M' ? 'receive-male' : 'receive-female');
                ?>
                <div>
                    <div class="msg-box">
                        <li class="<?= $class ?>">
                            <strong><?= htmlspecialchars($msg['username']) ?>:</strong> 
                            <?= htmlspecialchars($msg['message']) ?>
                        </li>
                        <span class="pastille <?= $class ?>">
                            <?php
                                $img = strtoupper(substr($msg['username'], 0, 2));
                                echo htmlspecialchars($img);
                            ?>
                        </span>
                    </div>
                    <span class="date"><?= date("d/m H:i", strtotime($msg['created_at'])) ?></span>
                </div>
                
            <?php endforeach; ?>
        </ul>

        <form id="form">
            <button class="add">+</button>
            <div class="msgbox">
                <textarea id="input" autocomplete="on" rows="1" placeholder="Message"></textarea>
                <button type="submit" class="submit">
                    <img src="content/ico/send_11271363.png" alt="icon envoyé">
                </button>
            </div>
        </form>

        <div class="option" id="option">
            <button class="opt-item">📷 Upload une photo</button>
            <button class="opt-item">📷 Upload une photo</button>
            <button class="opt-item">📷 Upload une photo</button>
            <button class="opt-item">📷 Upload une photo</button>
        </div>
    </div>

    <script>
        const form = document.getElementById('form');
        const input = document.getElementById('input');
        const messages = document.getElementById('messages');

        const containerChat = document.querySelector('.container-chat');
        const addBtn = document.querySelector('.add');
        const option = document.getElementById('option');
        addBtn.addEventListener('click', () =>{
            option.classList.add('active');
        })

        messages.addEventListener('click', () =>{
            if (option.classList.contains('active') == true){
                option.classList.remove('active')
            }
            else{
                exit()
            }
        })
        
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (input.value.trim()) {
                await fetch('send.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'msg=' + encodeURIComponent(input.value.trim())
                });
                input.value = '';

                // Recharge les messages
                const res = await fetch('messages.php');
                const html = await res.text();
                messages.innerHTML = html;
                messages.scrollTop = messages.scrollHeight; // auto-scroll en bas
            }
        });

        // Rafraîchissement automatique toutes les 3 secondes
        setInterval(async () => {
            const res = await fetch('messages.php');
            const html = await res.text();
            messages.innerHTML = html;
            messages.scrollTop = messages.scrollHeight;
        }, 3000);
    </script>
</body>
</html>
