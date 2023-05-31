<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>interneta veikals</title>
   <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
<header>
      <nav>
         <ul>
            <li><a href="#main">Galvenā</a></li>
            <li><a href="#about">Par mums</a></li>
            <li><a href="#services">Pakalpojumi</a></li>
            <li><a href="#blog">Ieraksti</a></li>
            <li><a href="#">Kontakti</a></li>
            <li><a href="login.php">Ielogoties</a></li>
         </ul>
      </nav>
   </header>

   <section id=main class="hero">
      <div class="hero-content">
         <h1>Sveicināts interneta veikalā!</h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
         <a href="#" class="btn">Sākt</a>
      </div>
   </section>

   <section id=about class="about">
      <div class="container">
         <h2>Par mums</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod scelerisque mi, sed euismod mauris finibus eu. Nunc in justo faucibus, pharetra tortor id, suscipit sem. Nam pulvinar justo magna, eu ultrices eros volutpat nec.</p>
      </div>
   </section>

   <section id=services class="hero">
      <div class="container">
         <h2>Mūsu pakalpojumi</h2>
         <div class="service">
            <h3>Pakalpojums 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod scelerisque mi, sed euismod mauris finibus eu.</p>
         </div>
         <div class="service">
            <h3>Pakalpojums 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod scelerisque mi, sed euismod mauris finibus eu.</p>
         </div>
         <div class="service">
            <h3>Pakalpojums 3</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod scelerisque mi, sed euismod mauris finibus eu.</p>
         </div>
      </div>
   </section>

   <section id=blog class="blog">
      <div class="container">
         <h2>Jaunākais ieraksts</h2>
         <div class="blog-post">
            <h3>Ieraksts 1</h3>
            <p>
            <?php
            require("connection.php");
            // Pārbauda savienojuma veiksmīgumu
            if (!$savienojums) {
            die("Savienojums ar datu bāzi neizdevās: " . mysqli_connect_error());
}
            // Izveido vaicājumu, lai iegūtu visjaunāko ierakstu no "ieraksti" tabulas
            $sql = "SELECT * FROM ieraksti ORDER BY datums DESC LIMIT 1";
            $result = mysqli_query($savienojums, $sql);

            // Pārbauda, vai rezultāts ir iegūts
            if (mysqli_num_rows($result) > 0) {
            // Izvada visjaunākā ieraksta tekstu
            $row = mysqli_fetch_assoc($result);
            echo "<p>" . $row["teksts"] . "</p>";
         } else {
            echo "<p>Nav atrasts neviens ieraksts.</p>";
}
            ?>
            </p>
   </section>

   <footer>
      <div class="container">
         <p>&copy; 2023 Your Company. All rights reserved.</p>
      </div>
   </footer>

</body>
</html>
