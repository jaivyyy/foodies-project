<?php
if (isset($_SESSION["user_id"]))    {

    $mysqli = require __DIR__   .   "/db.php";

     $sql = "SELECT * FROM user WHERE id      // Use a prepared statement for safety
= ?";
     $stmt = $mysqli->prepare($sql);
     $stmt->bind_param("i", $_SESSION["user_id"]);
     $stmt->execute();
     $result = $stmt->get_result();
     $user = $result->fetch_assoc();
     $stmt->close();
} else {
    $user = null;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Foodies</title>
  </head>
  <body>
  <?php
    require 'navbar.php';
    ?>

<div class="hero-image">
  <div class="hero-text">
    <h1>Welkom bij Foodies</h1>
    <button> Bekijk het menu</button>
  </div>
</div>

<div class="about-section">
  <h1>Over ons</h1>
  <p>
    Welkom bij Foodies – waar fastfood een Hollands tintje krijgt! Bij ons geniet je van snelle, 
    smaakvolle gerechten geïnspireerd op Nederlandse klassiekers. Denk aan gezelligheid, kwaliteit en een nette service, 
    allemaal onder één dak. Of je nu komt voor een snelle hap of een ontspannen maaltijd: bij Foodies voel je je altijd thuis.
  </p>
</div>
<section class="menu">
  <h2>Menu</h2>
  <div class="menu-grid">

    <div class="menu-item">
      <img src="menu-pictures/pizza.jpg" alt="Burger">
      <h3>Pizza Salami</h3>
      <p>Tomatensaus, Salami en kaas</p>
      <p>€9,50</p>
      <button>Toevoegen aan winkelwagen</button>
    </div>

    <div class="menu-item">
      <img src="menu-pictures/patat.jpg" alt="Frikandel">
      <h3>Patat</h3>
      <p>Aardappelen</p>
      <p>€3,50</p>
      <button>Toevoegen aan winkelwagen</button>
    </div>

    <div class="menu-item">
      <img src="menu-pictures/burger.jpg" alt="Patat">
      <h3>Burger</h3>
      <p>Rundvlees, Sla, Tomaat, Augurk</p>
      <p>7,00</p>
      <button>Toevoegen aan winkelwagen</button>
    </div>

    <div class="menu-item">
      <img src="menu-pictures/broodje.avif" alt="Kroket">
      <h3>Broodje gezond</h3>
      <p>Ragout, paneerlaag</p>
      <p>€2,00</p>
      <button>Toevoegen aan winkelwagen</button>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="footer-container">
    <div class="footer-logo">
      <h2>Foodies</h2>
      <p>Heerlijk eten, vers bereid.</p>
    </div>

    <div class="footer-links">
      <h3>Sitemap</h3>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">Over ons</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div>

    <div class="footer-contact">
      <h3>Contact</h3>
      <p>Email: info@foodies.nl</p>
      <p>Tel: 010 - 123 4567</p>
      <p>Adres: Etenstraat 5, Rotterdam</p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2025 Foodies. Alle rechten voorbehouden.</p>
  </div>
</footer>
  </body>
</html>
