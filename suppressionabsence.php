
<?php
			$id=$_GET['id'];
				try {
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
						$req="delete  FROM absence where Id_absence = '".$id."'";
						  $stmt=$dbh->prepare($req) ;
						  $stmt->execute();
						  header("location:listeabsence.php");
				}
				catch(PDOException $e)
				    {
				         echo  $e->getMessage();
				    }
			?>