<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ielogošanās lapa</title>
   <link rel="stylesheet" href="css/style.css">
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
						$Parole = mysqli_real_escape_string($savienojums, $_POST['password']);
						$sqlVaicajums = "SELECT * FROM lietotaji WHERE lietotaja_vards = '$Lietotajvards'";
						$rezultats = mysqli_query($savienojums, $sqlVaicajums); 

						if(mysqli_num_rows($rezultats) == 1){
							while($row = mysqli_fetch_array($rezultats)){
								if(password_verify($Parole, $row["Parole"])){
									$_SESSION["username"] = $Lietotajvards;
									header("location:Admin/index.php");
								}else{
									echo "Nepareizs E-pasts vai Parole!";
								}
							}
						}else{
							echo "Nepareizs E-pasts vai Parole!";
						}
					}

					if(isset($GET['logout'])){
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
