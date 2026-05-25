<?php
    $title = 'Pour_toi❤️';
    $link = 'static/style.css';
    require 'header.php';

    if(!isset($_COOKIE['username'])){
        header("location:index.php?error=!connected");
    }
?>
<body>
    <header class="header">
        <div class="heart"><img src="content/ico/heart.png" alt="heart"></div>
        <div class="header-title">NOTRE UNIVERS</div>
        <div class="heart"><img src="content/ico/heart.png" alt="heart"></div>
    </header>
    <div class="container">
        <section class="main">
            <div class="content">
                <p class="text">Bonjour, Mon Amour</p>
                <p>"Chaque instant avec toi est un trésor."</p>
            </div>
        </section>

        <!-- Nos Souvenir -->
        <section class="pictures">
            <div class="top">
                <p>Dernier souvenir</p>
                <a href="galerie.php">voir tout</a>
            </div>
            <div class="pictures-content">
                <div class="content-vid">
                    <video src="content/videos/23.MP4" autoplay loop controls muted></video>
                </div>
                <div class="content-text">
                    <p class="date">20 JANVIER 2025</p>
                    <p class="title">Soirée inoubliable</p>
                    <p class="txt">Your lips on my lips, alone, walking in the streets of the Plateau. I love you, Babe ❤️</p>
                    <br>
                    <p class="txt">🎵_Strong_Bieber</p>
                </div>
            </div>
        </section>

        <!-- Menu flottant -->
        <section class="menu">
            <div class="menu-content">
                <div class="item">
                    <button class="btn" id="home">
                        <img src="content/ico/home.png" alt="home">
                        <p>Accueil</p>
                    </button>
                </div>
                <div class="item">
                    <button class="btn" id="journal">
                        <img src="content/ico/open-book.png" alt="journal">
                        <p>Journal</p>
                    </button>
                </div>
                <button class="btn-plus">+</button>
                <div class="item">
                    <button class="btn" id="message">
                        <img src="content/ico/message.png" alt="message">
                        <p>Message</p>
                    </button>
                </div>
                <div class="item">
                    <button class="btn" id="volt">
                        <img src="content/ico/ouvrir.png" alt="volt">
                        <p>Coffre</p>
                    </button>
                </div>
            </div>
        </section>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>