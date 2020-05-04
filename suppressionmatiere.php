
<?php
			$id=$_GET['id'];
				try {
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
						$req="delete  FROM matiere where Id_matiere = '".$id."'";
						$req2="delete  FROM ensegner2 where Id_matier = '".$id."'";
						  $stmt=$dbh->prepare($req) ;
						  $stmt2=$dbh->prepare($req2) ;
						  $stmt->execute();
						  $stmt2->execute();
						  echo "$req";
						  echo "$req2";
						  header("location:listematiere.php");

				}
				catch(PDOException $e)
				    {
				         echo  $e->getMessage();
				    }
			?>