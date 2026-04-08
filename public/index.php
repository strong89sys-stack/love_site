<?php 
$title = 'login_page';
require 'header.php' ?>

<body>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            margin: 0;
            background-color: rgb(24, 17, 20);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 390px;
            color: #fff;
            position: relative;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            width: 80%;
            background-color: rgba(255, 255, 255, .1);
            padding: 3rem 0;
            backdrop-filter: blur(10px);
            border-radius: 30px;
        }
        input{
            width: 80%;
            height: 50px;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        h2{
            position: absolute;
            top: 0;
        }
        .submit{
            background: green;
            font-size: 1rem;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
    <h2>Formulaire de connexion 🔒</h2>
    <form id="form" method="post" action="login.php">
        <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        <button class="submit">Se connecter</button>
    </form>
</body>
</html>