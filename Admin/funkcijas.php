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

   <section id="funkcijas">

<?php
    require("../connection.php");
    if(isset($_POST['delete_product_btn'])){
        $id = $_POST['delete_id'];

        $query = "DELETE FROM katalogs WHERE id='$id'";
        $check_query = mysqli_query($savienojums, $query) or die ("Nepareizs pieprasījums!"); 

        if($check_query){
            echo "<div class='pazinojums zals'>Ieraksta dzēšana ir noritējusi veiksmīgi!</div>";
            header("Refresh: 2, url=products.php");
        }else{
            echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi!</div>";
            header("Refresh: 2, url=products.php");
        }
    }

    if(isset($_POST['edit_product'])){ 
        $id = $_POST['edit_id'];
        $nosaukums = $_POST['edit_nosaukums'];
        $cena = $_POST['edit_cena'];
        $apraksts = $_POST['edit_apraksts'];
        $attels = $_POST['edit_attels'];

        $query = "UPDATE katalogs SET nosaukums='$nosaukums', cena='$cena', apraksts='$apraksts', attels='$attels' WHERE id='$id'"; 
        $query_run = mysqli_query($savienojums, $query);

        if($query_run){
            echo "<div class='pazinojums zals'>Ieraksta rediģēšana ir noritējusi veiksmīgi!</div>";
            header("Refresh: 2, url=products.php");
        }else{
            echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi!</div>";
            header("Refresh: 2, url=products.php");
        }
    }

    if(isset($_POST['delete_order_btn'])){
        $id = $_POST['delete_id'];

        $query = "DELETE FROM klienti WHERE klienta_id='$id'";
        $check_query = mysqli_query($savienojums, $query) or die ("Nepareizs pieprasījums!"); 

        if($check_query){
            echo "<div class='pazinojums zals'>Ieraksta dzēšana ir noritējusi veiksmīgi!</div>";
            header("Refresh: 2, url=orders.php");
        }else{
            echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi!</div>";
            header("Refresh: 2, url=orders.php");
        }
    }

    if(isset($_POST['edit_client'])){ 
        $id = $_POST['edit_id'];
        $vards = $_POST['edit_vards'];
        $uzvards = $_POST['edit_uzvards'];
        $epasts = $_POST['edit_epasts'];
        $telnr = $_POST['edit_telnr'];
        $adrese = $_POST['edit_adrese'];
        $komentars = $_POST['edit_komentars'];
        $regdatums = $_POST['edit_regdatums'];
        
        $query = "UPDATE klienti SET vards='$vards', uzvards='$uzvards', epasts='$epasts', telnr='$telnr', adrese='$adrese', komentars='$komentars', reg_datums='$regdatums' WHERE klienta_id='$id'"; 
        $query_run = mysqli_query($savienojums, $query);

        if($query_run){
            echo "<div class='pazinojums zals'>Ieraksta rediģēšana ir noritējusi veiksmīgi!</div>";
            header("Refresh: 2, url=orders.php");
        }else{
            echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi!</div>";
            header("Refresh: 2, url=orders.php");
        }
    }
?>
   </section>
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