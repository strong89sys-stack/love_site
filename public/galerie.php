<?php
  $title = "Notre_univers ✨";
  $link = "static/galerie.css"
?>
<?php require 'header.php' ?>

<body>
  <div class="gallery-container">
    <h1> 💖</h1>

    <div class="gallery">
  <div class="item wide">
    <img src="../A.jpg" alt="Souvenir 1">
  </div>
  <div class="item tall">
    <video autoplay muted loop playsinline>
        <source src="./content/videos/0.mp4" type="video/mp4">
    </video>
  </div>

  <div class="item small">
    <img src="./content/img/A.jpg" alt="Souvenir 2">
  </div>

  <div class="item wide">
    <video autoplay muted loop playsinline>
        <source src="./content/videos/1.mp4" type="video/mp4">
    </video>
  </div>

  <div class="item medium">
    <video autoplay muted loop playsinline>
        <source src="./content/videos/2.mp4" type="video/mp4">
    </video>
  </div>

  <div class="item tall">
    <img src="./content/img/B.jpg" alt="Souvenir 3">
  </div>

  <div class="item medium">
    <video autoplay muted loop playsinline>
        <source src="./content/videos/4.mp4" type="video/mp4">
    </video>
  </div>

  <div class="item small">
    <video autoplay muted loop playsinline>
        <source src="./content/videos/5.mp4" type="video/mp4">
    </video>
  </div>

  <div class="item wide">
    <video autoplay muted loop playsinline>
        <source src="./content/videos/6.mp4" type="video/mp4">
    </video>
  </div>
  
 <div class="container">
    <p>Respire un bon coup avant de continuer, parce t'es pas prête pour ce qui arrive...😁</p>
    <a href="final.html" class="cta-button">Continuer</a>
 </div>

<script>
  window.addEventListener("load", () => {
    const videos = document.querySelectorAll("video");
    
    videos.forEach(video => {
      video.muted = true;            // sécurité supplémentaire
      video.playsInline = true;
      video.currentTime = 0;         // repart du début
      video.play().catch(err => {
        console.warn("Vidéo non lancée :", err);
      });
    });
  });
</script>

</body>
</html>