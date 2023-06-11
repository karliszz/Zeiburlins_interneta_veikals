<?php
   session_start();

   // Pārbauda vai ir aktīva sesija un vai ir saglabāts lietotājvārds
   if(isset($_SESSION["username"])) {
      // Sesija ir aktīva, lietotājvārds ir saglabāts
      // Izvadīt administrācijas paneli un atbilstošo saturu
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktu rediģēšana</title>
    <link rel="stylesheet" type="text/css" href="../CSS/admin.css">
</head>

<body>
<header>
      <nav>
         <ul>
            <li><a href="index.php">Galvenā lapa</a></li>
            <li id="active"><a href="products.php">Produkti</a></li>
            <li><a href="orders.php">Pasūtijumi</a></li>
            <li><a href="logout.php">Izlogoties</a></li>
         </ul>
      </nav>
   </header>

    <div id="preces_add">
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                require("../connection.php");

                if(isset($_POST['prece_add'])){  
                    $nosaukums_input = $_POST['nosaukums']; 
                    $cena_input = $_POST['cena'];
                    $apraksts_input = $_POST['apraksts'];
                    $attels_input = $_POST['attels'];

                        if(!empty($nosaukums_input ) && !empty($cena_input) && !empty($apraksts_input) && !empty($attels_input)){                    
                            // Veic INSERT vaicājumu, lai pievienotu ierakstu tabulā "katalogs".
                            $prece_pievienot = "INSERT INTO katalogs(nosaukums, cena, apraksts, attels) VALUES('$nosaukums_input', '$cena_input', 
                            '$apraksts_input', '$attels_input')";

                            if(mysqli_query($savienojums, $prece_pievienot)){
                                // Ja vaicājums izpildās veiksmīgi, parāda veiksmes paziņojumu un pāradresē uz "products.php" lapu.
                                echo "<div class='pazinojums zals'>Preču pievienošana ir noritējusi veiksmīgi!</div>";
                                header("Refresh: 2, url=products.php");
                            }else{
                                // Ja vaicājums neizdodas, parāda kļūdas paziņojumu un pāradresē uz "products.php" lapu.
                                echo "<div class='pazinojums sarkans'>Preču pievienošana nav izdevusies! Kļūda sistēmā!</div>";
                                header("Refresh: 2, url=products.php");
                            }
                    } else {
                        // Ja ievades lauki nav aizpildīti, parāda paziņojumu par kļūdu.
                        echo "<div class='pazinojums sarkans'>Preču pievienošana nav izdevusies! Ievades lauku kļūdas!</div>";
                    }   
                    

                }else{

        ?>
        <div class="row">
            <form method='post'>
                <input type="text" placeholder="Nosaukums *" name="nosaukums" class="box-form" title="Nosaukums" required>
                <input type="text" placeholder="Cena *" name="cena" class="box-form" title="Cena" required>
                <input type="text" placeholder="Apraksts *" name="apraksts" class="box-form" title="Apraksts" required>
                <input type="text" placeholder="Attēls *" name="attels" class="box-form" title="Attēls" required>
                <input type="submit" value="Pievienot preci!" class="reserve-btn" name="prece_add">
            </form>
        </div>

        <?php
                }   
            }else{
                    echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi! Atgriezies sākumlapā un mēģini vēlreiz!</div>";
                    header("Refresh:2; url=products.php");
                }
        ?>

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