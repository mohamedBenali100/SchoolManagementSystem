
<?php
			$id=$_GET['id'];
				try {
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
						$req="delete  FROM Niveau where Id_niveau = '".$id."'";
						  $stmt=$dbh->prepare($req) ;
						  $stmt->execute();
						  header("location:listeclasse.php");
				}
				catch(PDOException $e)
				    {
				         echo  $e->getMessage();
				    }
			?>