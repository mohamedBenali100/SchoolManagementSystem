
<?php
			$id=$_GET['id'];
				try {
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
						$req="delete  FROM filiere where Id_filiere = '".$id."'";
						  $stmt=$dbh->prepare($req) ;
						  $stmt->execute();
						  header("location:listefiliere.php");
				}
				catch(PDOException $e)
				    {
				         echo  $e->getMessage();
				    }
			?>