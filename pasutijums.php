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
            <li><a href="index.php">Galvenā</a></li>
            <li><a href="index.php">Par mums</a></li>
            <li><a href="index.php">Katalogs</a></li>
            <li><a href="index.php">Pakalpojumi</a></li>
            <li><a href="index.php">Ieraksti</a></li>
            <li><a href="login.php">Ielogoties</a></li>
         </ul>
      </nav>
   </header>
   <div id="pasutit">
   
   <div class="row">
        <form method='post'>
            <input type="text" placeholder="Vārds *" name="vards" class="box1" title="Vārds" required>
            <input type="text" placeholder="Uzvārds *" name="uzvards" class="box1" title="Uzvārds" required>
            <input type="epasts" placeholder="E-pasts" name="epasts" class="box1" title="E-pasts">
            <input type="number" placeholder="Tālrunis *" name="telnr" class="box1" title="Tālrunis" required>
            <input type="text" placeholder="Dzīvesvietas adrese *" name="adrese" class="box1" title="Dzīvesvietas adrese">
            <input type="text" placeholder="Jūsu izvētētais produkts " name="produkta_pasutijums" class="box1" title="Jūsu izvētētais produkts " value="<?php echo $produkts; ?>" readonly>
            <textarea placeholder="Jūsu komentārs" name="komentars" class="box2" title="Jūsu komentārs un vai piezīmes"></textarea>

            <input type="submit" value="Izveidot pasūtījumu!" class="btn" name="gatavs">
        </form>
    </div>

   <footer>
      <div class="container">
         <p>&copy; 2023 Blossom Beauty. All rights reserved.</p>
      </div>
   </footer>

</body>
</html>
