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
   <section>
   <div id="pasutit">
   <?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
    require("connection.php");

    /* Kad metode ir pielietota, tad mainīgas izvadīs norādītos datus */
    if(isset($_POST['gatavs'])){  /* Ja nospiesta poga "gatavs" */
        $vards_ievade = $_POST['vards']; /*  Iegūt ievadīto vārdu */
        $uzvards_ievade = $_POST['uzvards']; /* Iegūt ievadīto uzvārdu */
        $epasta_ievade = $_POST['epasts'];/* Iegūt ievadīto e-pastu */
        $talrunis_ievade = $_POST['telnr']; /* Iegūt ievadīto tālruņa  */
        $dzivesvietas_ievade = $_POST['adrese']; /*  Iegūt ievadīto dzīvesvietu */
        $produkta_ievade = $_POST['produkta_pasutijums']; /* Iegūt ievadīto produkta pasūtījumu */
        $komentara_ievade = $_POST['komentars']; /* Iegūt ievadīto komentāru */

        {
            if(!empty($vards_ievade) && !empty($uzvards_ievade) && !empty($epasta_ievade) && !empty($talrunis_ievade) 
            && !empty($dzivesvietas_ievade)){
                $registret_klientu_SQL = "INSERT INTO klienti(vards, uzvards, epasts, telnr, adrese, produkta_pasutijums, komentars) 
                VALUES('$vards_ievade', '$uzvards_ievade', '$epasta_ievade', '$talrunis_ievade', '$dzivesvietas_ievade', '$produkta_ievade', 
                '$komentara_ievade')";
                /* Izveidot vaicājumu, lai ievietotu klienta datus datu bāzē */

                if(mysqli_query($savienojums, $registret_klientu_SQL)){
                    echo "<div class='pazinojums zals'>Pasūtījuma reģistrācija ir noritējusi veiksmīgi! Kurjers ar jums sazināsies!</div>";
                    header("Refresh:2; url=index.php");
                }else{
                    echo "<div class='pazinojums sarkans'>Reģistrācija nav izdevusies! Kļūda sistēmā!</div>";
                }
            }else{
                echo "<div class='pazinojums sarkans'>Reģistrācija nav izdevusies! Ievades lauku problēmas!</div>";
            }
        }
    }else{

   $produkts = $_POST['pasutit1'];
        echo $produkts;
        ?>
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

    <?php
            }
        }else{
                echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi! Atgriezies sākumlapā un mēģini vēlreiz!</div>";
                header("Refresh:2; url=index.php");
            }
    ?> 
</section>
   <footer>
      <div class="container">
         <p>&copy; 2023 Blossom Beauty. All rights reserved.</p>
      </div>
   </footer>

</body>
</html>
