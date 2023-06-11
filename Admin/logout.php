<?php
    session_start();

    // Pārtrauc sesiju un novirza uz ielogošanās lapu
    if(session_destroy()){
        header("Location: ../login.php");
    }
?>