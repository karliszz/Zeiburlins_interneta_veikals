<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ielogošanās lapa</title>
   <link rel="stylesheet" href="css/login.css">
</head>
<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>Ielogošanās sistēmā</h3>

         <?php 
					if(isset($_POST['submit'])){
						require("connection.php");
						session_start();
						$Lietotajvards = mysqli_real_escape_string($savienojums, $_POST['email']);
						/* Iegūt un apstrādāt ievadīto lietotājvārdu */
						$Parole = mysqli_real_escape_string($savienojums, $_POST['password']);
						/* Iegūt un apstrādāt ievadīto paroli */
						$sqlVaicajums = "SELECT * FROM lietotaji WHERE lietotaja_vards = '$Lietotajvards'";
						/* Izveidot vaicājumu, lai iegūtu lietotāja datus */
						$rezultats = mysqli_query($savienojums, $sqlVaicajums); 
						/* Izpildīt vaicājumu un saglabāt rezultātu */

						if(mysqli_num_rows($rezultats) == 1){
							/* Ja ir atrasts tikai viens ieraksts */
							while($row = mysqli_fetch_array($rezultats)){
								/* Iegūt katru ierakstu rezultātu */
								if(password_verify($Parole, $row["Parole"])){
									/* Salīdzināt ievadīto paroli ar saglabāto paroli */
									$_SESSION["username"] = $Lietotajvards;
									/* Iestatīt sesijas lietotājvārdu */
									header("location:Admin/index.php");
									/* Novirzīt uz administrācijas lapu */
								}else{
									echo "Nepareizs E-pasts vai Parole!";
									/* Parādīt kļūdas paziņojumu par nepareizu e-pastu vai paroli */
								}
							}
						}else{
							echo "Nepareizs E-pasts vai Parole!";
						}
					}

					if(isset($GET['logout'])){
						/* Ja ir pieprasīts izlogošanās */
						session_destroy();
					}
		
				?>

         <input type="email" name="email" required placeholder="Ievadiet savu e-pastu">
         <input type="password" name="password" required placeholder="Ievadiet savu paroli">
         <input type="submit" name="submit" value="Ielogoties" class="form-btn">
      </form>
   </div>
</body>
</html>
