<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joyeux anniversaire 🎉</title>
  <link rel="stylesheet" href="final.css">
</head>
<body>
  <div class="proposal-container">
    <h1>🎉 Happy Birthday ! 🎂</h1>
    <p>Appuie sur le bouton et laisse la magie opérer 😎</p>

    <button id="celebrate-btn">Célébrer !</button>

    <div class="cake-rain hidden">
      <!-- Génère 50 gâteaux avec des <span> -->
      <!-- Tu peux en générer plus ou moins -->
      <div id="cake-field"></div>
      <p class="celebrate-message">🎉 Joyeux anniversaire Zouzou 🎉! </p>
    </div>
  </div>

    <script>
      const button = document.getElementById('celebrate-btn');
      const container = document.querySelector('.cake-rain');
      const cakeField = document.getElementById('cake-field');

      button.addEventListener('click', () => {
        container.classList.remove('hidden');

        // Génère 50 gâteaux 🎂
        for (let i = 0; i < 50; i++) {
          const cake = document.createElement('span');
          cake.textContent = '🎂❤';
          cake.style.left = Math.random() * 100 + 'vw';
          cake.style.animationDuration = (2 + Math.random() * 3) + 's';
          cake.style.fontSize = (1.8 + Math.random() * 1.2) + 'rem';
          cakeField.appendChild(cake);
        }

        // Enregistre la célébration avec la date
        const now = new Date();
        localStorage.setItem("anniv_date", now.toLocaleString("fr-FR"));
      });
    </script>
</body>
</html>