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
            <li><a href="index.php">Galvenā lapa</a></li>
            <li><a href="products.php">Produkti</a></li>
            <li id="active"><a href="orders.php">Pasūtījumi</a></li>
            <li><a href="logout.php">Izlogoties</a></li>
         </ul>
      </nav>
   </header>

   <div class="container">
      <h1>Pasūtījumi </h1>
      <!-- Šeit bus funkcija kura uzradīs visus pasutijumus -->
   </div>

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