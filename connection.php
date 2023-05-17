<?php 
    //mainigie
    $servera_vards = "localhost:3306"; 
    $lietotajvards = "root";
    $parole = "";
    $db_vards = "datubaze";

    $savienojums = mysqli_connect($servera_vards, $lietotajvards, $parole, $db_vards);


    if(!$savienojums){
        die("Pieslēgties neizdevās:".mysqli_connect_error());
    }else{
       // echo "Savienojms ar datubāze ir veiksmigi izveidots!!";
    }
?>