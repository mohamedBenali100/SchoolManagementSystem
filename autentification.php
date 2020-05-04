<!DOCTYPE html>
<html>
<head>
	<title>Gestion d'ecole</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="autentification.css">
	<link rel="icon" href="./image/iconhead.png" type="image/x-icon/png/jpg" /> 
</head>
<body>

	<?php
	$s="display: none;";
		if(isset($_GET['erreur'])){
			echo '<div class="alert alert-danger" role="alert" style="padding:20px;">
							 		 <b>Username or Password are incorrect !!!
										</div>';
		}
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
			try {
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
				        $stmt=$dbh->prepare("SELECT Username,Password FROM admin where Username='".$_POST['login']."' and Password='".$_POST['pwd']."'");
				        $stmt->execute();
				        if($stmt->rowcount()==1){
				        	session_start();
				        	 $_SESSION['login']=$_POST['login'];
				        	 header("location: index.php");
				        	 die();
				        }else{
							  header("location:autentification.php?erreur");
							  die();
				        }
				         
				    }
				    catch(PDOException $e)
				    {
				        echo  $e->getMessage();
				    }
		}
				
			?>
	<div class="container">
		<div class="row">
			<div class="col-4 offset-4">
				<form class="card custom" action=""  method="post">
					<div class="card-body">
						<h5 class="card-title">Login</h5>
						<div class="form-group">
							<label>Username:</label>
							<input type="text" class="form-control" name="login">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" name="pwd">
						</div>
						 <button type="submit" class="btn btn-primary">Log In</button>
					</div>
				</form>
			</div>
		</div>	
	</div>

</body>
</html>