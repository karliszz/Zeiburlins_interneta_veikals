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
            <li id="active"><a href="products.php">Products</a></li>
            <li><a href="orders.php">Pasūtijumi</a></li>
            <li><a href="logout.php">Izlogoties</a></li>
         </ul>
      </nav>
   </header>

    <section id="preces_edit">
        
        <?php
        require("../connection.php");
        if (isset($_POST['edit_product_btn'])) {
            $id = $_POST['edit_id'];
            
            $query = "SELECT * FROM precesinfo WHERE id='$id'";
            $query_run = mysqli_query($savienojums, $query);
            
            foreach($query_run as $row){
                ?>
      <div>
      <?php echo "<img class='precu_attels' src='{$row['attels']}'>" ?>
      </div>
        <div class="row">
            <form action="funkcijas.php" method='post'>
                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                <input type="text" value="<?php echo $row['nosaukums']?>" placeholder="Nosaukums *" name="edit_nosaukums" class="box-form" title="Nosaukums" required>
                <input type="text" value="<?php echo $row['cena']?>" placeholder="Cena *" name="edit_cena" class="box-form" title="Cena" required>
                <input type="text" value="<?php echo $row['apraksts']?>" placeholder="Apraksts *" name="edit_apraksts" class="box-form" title="Apraksts" required>
                <input type="text" value="<?php echo $row['attels']?>" placeholder="Attēls *" name="edit_attels" class="box-form" title="Attēls" required>
                <input type="submit" value="Rediģēt preci!" class="edit-btn" name="edit_product">
                <a href="products.php" class="cancel-btn">Atcelt!</a>
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