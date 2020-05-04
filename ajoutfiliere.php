<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include("cadre.php") ?>
		<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
			<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;">
		  		<span class="glyphicon glyphicon-plus"></span>Ajouter une nouvelle filiere
			</div>
			<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Ajout filiere</div>
		 	<div class="btn a7">
				<a href="ajoutclasse.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-plus" style="font-size: 85%;"></span>Ajouter classe</button></a>	
				<a href="listeclasse.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%;"></span>Liste des classes</button></a>
		 		<a href="ajoutfiliere.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-plus" style="font-size: 85%;"></span>Ajouter filiere</button></a>	
				<a href="listefiliere.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%;"></span>Liste des filieres</button></a>

		 	</div>
			<div class="card" style="margin-top: 50px;">
				<div class="panel panel-default cader">
					<div class="panel-heading">
				    	<h3 class="panel-title"><span class ="
glyphicon glyphicon-info-sign"></span>Formulaire d'ajout de filiere</h3>
					</div>
					<div class="panel-body">
						<form action="" method="post">
					    	<div class="part" style="margin-right: 10%;">
					    		<div>
					    			Nom de filiere: 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="NOM" name="nomfiliere">
						    	</div>
						    	<div>
						    		Nommer numerique: 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="ID" name="id_filiere">
					    		</div>
					    	</div>
					</div>
				</div>
				<div id="btn">
					<a href="listefiliere.php"><button type="submit" class="btn btn-primary"><span class="
glyphicon glyphicon-floppy-disk"></span>Enregistrer</button>
					
<a href="listefiliere.php" class="btn btn-primary" role="button" title="listeetudiant"><span class="
glyphicon glyphicon-th-list"></span>Retourner a la liste des filieres</a>
					<input type="hidden" name="Enregistrer" value="1">
				</div>
				</form>
				<?php
							if(isset($_POST["Enregistrer"])){
								$Id_filiere=$_POST["id_filiere"];
								$nomfiliere=$_POST["nomfiliere"];
								$req="insert into filiere value('$Id_filiere','$nomfiliere')";
									try {
									    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
									        $stmt=$dbh->prepare($req);
									        $stmt->execute();
									        echo '<script> window.location = "listefiliere.php" </script>';
									   }				
									catch(PDOException $e)
									    {
									         echo  $e->getMessage();
									    }
							}
								?>				
			</div>

		</div>
	</body>
</html>