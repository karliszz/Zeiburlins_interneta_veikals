<?php
   session_start();

   // Pārbauda vai ir aktīva sesija un vai ir saglabāts lietotājvārds
   if(isset($_SESSION["username"])) {
      // Sesija ir aktīva, lietotājvārds ir saglabāts
      // Izvadīt administrācijas paneli un atbilstošo saturu
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel</title>
   <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
   <header>
      <nav>
         <ul>
            <li><a href="../index.php">Galvenā lapa</a></li>
            <li><a href="products.php">Produkti</a></li>
            <li><a href="orders.php">Pasutijumi</a></li>
            <li><a href="logout.php">Izlogoties</a></li>
         </ul>
      </nav>
   </header>

   <section id="admin-stat">
        <div class="statistics">
            <div class="info">
                <span>
                    <?php 
                        require("../connection.php");
                        // Izveido pieprasījumu, lai iegūtu precu skaitu no datubāzes tabulas "precusk"
                        $statSQL = "SELECT * FROM precusk";
                        $readstat = mysqli_query($savienojums, $statSQL) or die ("Nepareizs pieprasījums!"); 
                        // Izvada katru iegūto ierakstu, attēlojot "Precu_sk" lauku
                        while($row = mysqli_fetch_assoc($readstat)){ 
                            echo "{$row['Precu_sk']}"; 
                        }
                    ?>
                </span>
                <h3>Preču skaits</h3>
            </div>
            <div class="info">
                <span>
                    <?php 
                        $statSQL = "SELECT * FROM pasutijumusk24h";
                        // Izveido pieprasījumu, lai iegūtu informāciju par pasūtījumu skaitu no datubāzes tabulas "pasutijumusk24h"
                        $readstat = mysqli_query($savienojums, $statSQL) or die ("Nepareizs pieprasījums!"); 
                        // Izvada katru iegūto ierakstu, attēlojot "Pasutijumu_skaits" lauku
                        while($row = mysqli_fetch_assoc($readstat)){ 
                            echo "{$row['Pasutijumu_skaits']}"; 
                        }
                    ?>
                </span>
                <h3>Pasūtījumu skaits pēdējās 24 stundās</h3>
            </div>     
        </div>
    </section>

   <footer>
      <p>&copy; 2023 Your Company. All rights reserved.</p>
   </footer>
</body>
</html>
<?php
   } else {
      // Sesija nav aktīva vai lietotājvārds nav saglabāts
      // Veikt atbilstošu rīcību, piemēram, pāradresēt uz ielogošanās lapu
      header("Location: ../login.php");
      exit(); // Beigt skriptu izpildi
   }
?>