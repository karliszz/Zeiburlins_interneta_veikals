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
    <title>Klientu rediģēšana</title>
    <link rel="stylesheet" type="text/css" href="../CSS/admin.css">
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

    <section id="klienti_edit">
        <?php
        require("../connection.php");
        // Pārbauda vai ir nospiesta "edit_client_btn" poga
        if (isset($_POST['edit_client_btn'])) {
            $id = $_POST['edit_id'];
            
            // Izveido pieprasījumu, lai iegūtu klienta informāciju pēc klienta ID
            $query = "SELECT * FROM klientiinfo WHERE klienta_id='$id'";
            $query_run = mysqli_query($savienojums, $query);

            foreach($query_run as $row){
                
                ?>
        <div class="row">
            <form action="funkcijas.php" method='post'>
                <input type="hidden" name="edit_id" value="<?php echo $row['klienta_id']?>">
                <!-- Pārsūta klienta ID, lai to varētu atjaunināt -->
                <input type="text" value="<?php echo $row['vards']?>" placeholder="Vārds *" name="edit_vards" class="box-form" title="Vārds" required>
                <input type="text" value="<?php echo $row['uzvards']?>" placeholder="Uzvārds *" name="edit_uzvards" class="box-form" title="Uzvārds" required>
                <input type="email" value="<?php echo $row['epasts']?>" placeholder="E-pasts *" name="edit_epasts" class="box-form" title="E-pasts" required>
                <input type="text" value="<?php echo $row['telnr']?>" placeholder="Telefona Nr. *" name="edit_telnr" class="box-form" title="Telefona Nr." required>
                <input type="text" value="<?php echo $row['adrese']?>" placeholder="Adrese *" name="edit_adrese" class="box-form" title="Adrese" required>
                <input type="text" value="<?php echo $row['komentars']?>" placeholder="Komentārs *" name="edit_komentars" class="box-form" title="Komentārs">
                <input type="text" value="<?php echo $row['reg_datums']?>" placeholder="Reģistrācijas datums *" name="edit_regdatums" class="box-form" title="Reģistrācijas datums" readonly>
                <input type="submit" value="Rediģēt klientu!" class="edit-btn" name="edit_client">
                <a href="orders.php" class="cancel-btn">Atcelt!</a>
            </form>         
        </div>
        </section>
        <?php
            }
        }
        ?>
    </div>
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