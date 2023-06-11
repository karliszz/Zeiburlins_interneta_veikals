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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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

   <section id="pasutijumu-attelosana">
        <div class="row">
            <div class="pasutijumu-info">
                    <table>
                    <tr>
                        <th>Vārds</th>
                        <th>Uzvārds</th>
                        <th>E-pasts</th>
                        <th>Telefona Nr.</th>
                        <th>Adrese</th>
                        <th>Pasūtītajs produkts</th>
                        <th>Pasūtītāja komentārs</th>
                        <th>Reģistrācijas datums</th>
                    </tr>
                    <?php 
                        require("../connection.php");
                        $pasutijumiSQL = "SELECT * FROM pasutijumi";
                        $read_pasutijumi = mysqli_query($savienojums, $pasutijumiSQL) or die ("Nepareizs pieprasījums!"); 

                        if(mysqli_num_rows($read_pasutijumi) >0){
                            while($row = mysqli_fetch_assoc($read_pasutijumi)){
                                echo "
                                    <tr>
                                        <td>{$row['vards']}</td>
                                        <td>{$row['uzvards']}</td>
                                        <td>{$row['epasts']}</td>
                                        <td>{$row['telnr']}</td>
                                        <td>{$row['adrese']}</td>
                                        <td>{$row['produkta_pasutijums']}</td>
                                        <td>{$row['komentars']}</td>
                                        <td>{$row['reg_datums']}</td>
                                        <td>
                                        <form action='clients_edit.php' method='post'>
                                        <input type='hidden' name='edit_id' value='{$row['klienta_id']}'>
                                            <button type='submit' name='edit_client_btn'>
                                                <i class='fa fa-pencil'></i>
                                            </button>
                                        </form>              
                                        </td>
                                        <td>
                                        <form action='funkcijas.php' method='post'>
                                        <input type='hidden' name='delete_id' value='{$row['klienta_id']}'>
                                            <button type='submit' name='delete_order_btn'>
                                            <i class='fa fa-trash'></i>
                                            </button>
                                        </form>         
                                    </td>   
                                    </tr>
                                ";
                            }
                        }else{
                            echo "Tabula nav datu ko attēlot!";
                        }
                    ?>
                    <table>
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