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
            <li id="active"><a href="products.php">Produkti</a></li>
            <li><a href="orders.php">Pasūtijumi</a></li>
            <li><a href="logout.php">Izlogoties</a></li>
         </ul>
      </nav>
   </header>

   <section id="preces-attelosana">
        <div class="row">
            <div class="preces-info">
                    <table>
                    <tr>
                        <th>Preces nosaukums</th>
                        <th>Preces cena</th>
                        <th>Preces apraksts</th>
                    </tr>
                    <?php 
                        require("../connection.php");
                        $precesSQL = "SELECT * FROM preces";
                        $read_preces = mysqli_query($savienojums, $precesSQL) or die ("Nepareizs pieprasījums!"); 

                        if(mysqli_num_rows($read_preces) >0){
                            while($row = mysqli_fetch_assoc($read_preces)){
                                echo "
                                    <tr>
                                        <td>{$row['nosaukums']}</td>
                                        <td>{$row['cena']}</td>
                                        <td>{$row['apraksts']}</td>
                                        <td>
                                        <form action='products_edit.php' method='post'>
                                        <input type='hidden' name='edit_id' value='{$row['id']}'>
                                            <button type='submit' name='edit_product_btn'>
                                                <i class='fa fa-pencil'></i>
                                            </button>
                                        </form>              
                                        </td>
                                        <td>
                                        <form action='funkcijas.php' method='post'>
                                        <input type='hidden' name='delete_id' value='{$row['id']}'>
                                            <button type='submit' name='delete_product_btn'>
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

    <div>  
        <form action='products_create.php' method='post'>
                <button type='submit' name='create_product_btn'>
                    <i class="fa-regular fa-square-plus"></i>
                </button>
        </form>                            
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