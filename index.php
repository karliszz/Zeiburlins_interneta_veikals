<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blossom Beauty</title>
   <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
<header>
      <nav>
         <ul>
            <li><a href="#main">Galvenā</a></li>
            <li><a href="#about">Par mums</a></li>
            <li><a href="#katalogs">Katalogs</a></li>
            <li><a href="#services">Pakalpojumi</a></li>
            <li><a href="#blog">Ieraksti</a></li>
            <li><a href="login.php">Ielogoties</a></li>
         </ul>
      </nav>
   </header>

   <section id=main class="hero">
      <div class="hero-content">
         <h1>Sveicināts interneta veikalā Blossom Beauty!</h1>
         <a href="#" class="btn">Sākt</a>
      </div>
   </section>

   <section id=about class="about">
      <div class="container">
         <h2>Par mums</h2>
         <h2>Blossom Beauty ir ekskluzīvs interneta veikals, kas ir veltīts sievietēm, kuras vēlas atklāt savu skaistumu un izpaust to pilnībā. Mūsu veikals piedāvā plašu smaržu un kosmētikas sortimentu, kas iemieso eleganci un radošumu no pasaules slavenākajiem zīmoliem.</h2>
         <h2>
         Mūsu misija ir sniegt klientiem ne tikai augstas kvalitātes produktus, bet arī personisku un izsmalcinātu apkalpošanu. Mūsu virtuālie skaistumkopšanas konsultanti ir gatavi dalīties ar padomiem, izglītot un palīdzēt klientiem izvēlēties ideālus produktus, kas atspoguļo viņu individuālo stilu un vēlmju.
</h2>
      </div>
   </section>

   <section id="katalogs">
   <h2>Katalogs</h2>
    <div class="box-container">

        <!-- PHP ATVERSANA-->
        <?php
            require("connection.php");

            $katalogsSQL = "SELECT * FROM katalogs";
            $atlasaProduktus = mysqli_query($savienojums, $katalogsSQL) or die ("Nekorekts vaicājums!");

            if(mysqli_num_rows($atlasaProduktus) > 0){
                while($row = mysqli_fetch_assoc($atlasaProduktus)){
            echo "
            <div class='box'>
                <img src='{$row['attels']}'>
                <h2>{$row['nosaukums']}</h2>
                <p>{$row['apraksts']}</p>
                <h2>Cena: {$row['cena']} €</h2>
                <form action = 'pasutijums.php' method = 'post' >
                            <button type='submit' name='pasutit1' class='btn' value='{$row['nosaukums']}'>Izveleties
                        </form>
            </div>";
        }
    }else{
        echo "Datubāzē nav neviena produkta!";
    }
?>
        
    </div>
</section>

   <section id=services class="hero">
      <div class="container">
         <h2>Mūsu pakalpojumi</h2>
         <div class="service">
         <?php
      require("connection.php");
      // Pārbauda savienojuma veiksmīgumu
      if (!$savienojums) {
         die("Savienojums ar datu bāzi neizdevās: " . mysqli_connect_error());
         }
     // Izvelkam trīs dazādus tekstu ar trim dažādiem virsrakstiem no tabulas
     $sql = "SELECT virsraksts, saturs FROM pakalpojumi ORDER BY RAND() LIMIT 3";
     $result = mysqli_query($savienojums, $sql);
     
     if ($result->num_rows > 0) {
            // Izvadam katru ierakstu ar virsrakstu un saturu
            while ($row = $result->fetch_assoc()) {
            $virsraksts = $row["virsraksts"];
            $saturs = $row["saturs"];
     
             echo "<h2>$virsraksts</h2>";
             echo "<p>$saturs</p>";
             echo "<br>";
         }
     } else {
         echo "Nav atrasti rezultāti.";
     }
         ?>
         </div>
      </div>
   </section>

   <section id=blog class="blog">
      <div class="container">
         <h2>Jaunākais ieraksts</h2>
         <div class="blog-post">
            <h3>Aktuāli</h3>
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
         <p>&copy; 2023 Blossom Beauty. All rights reserved.</p>
      </div>
   </footer>

</body>
</html>
