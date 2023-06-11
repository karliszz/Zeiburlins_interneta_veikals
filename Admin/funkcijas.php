<?php
    require("../connection.php");
    if(isset($_POST['delete_product_btn'])){
        $id = $_POST['delete_id'];

        $query = "DELETE FROM katalogs WHERE id='$id'";
        $check_query = mysqli_query($savienojums, $query) or die ("Nepareizs pieprasījums!"); 

        if($check_query){
            echo "<div class='notif suc'>Ieraksta dzēšana ir noritējusi veiksmīgi!</div>";
            header("Refresh: 2, url=products.php");
        }else{
            echo "<div class='notif unsuc'>Kaut kas nogāja greizi!</div>";
            header("Refresh: 2, url=products.php");
        }
    }

    if(isset($_POST['delete_order_btn'])){
        $id = $_POST['delete_id'];

        $query = "DELETE FROM klienti WHERE klienta_id='$id'";
        $check_query = mysqli_query($savienojums, $query) or die ("Nepareizs pieprasījums!"); 

        if($check_query){
            echo "<div class='notif suc'>Ieraksta dzēšana ir noritējusi veiksmīgi!</div>";
            header("Refresh: 2, url=orders.php");
        }else{
            echo "<div class='notif unsuc'>Kaut kas nogāja greizi!</div>";
            header("Refresh: 2, url=orders.php");
        }
    }
?>