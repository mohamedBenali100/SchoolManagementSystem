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
		  		<span class="glyphicon glyphicon-plus"></span>Ajouter une matiere
			</div>
			<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Ajout de matiere</div>
			<div class="card" style="margin-top: 50px;">
				<div class="panel panel-default cader">
					<div class="panel-heading">
				    	<h3 class="panel-title"><span class ="
glyphicon glyphicon-info-sign"></span>Formulaire d'ajout des matieres</h3>
					</div>
					<div class="panel-body">
									<form action="" method="post">
								    	<div class="part" style="margin-right: 10%;">
								    		<div>	
									    		Code matiere: 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="" name="code">
								    		</div>
								    	</div>
								    	<div class="part">
								    		<div>	
									    		Nom du matiere : 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="" name="nom">
								    		</div>
								    		<div>
								    			Affecter à : 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="" name="idprof">
								    		</div>
								    	</div>
								</div>
							</div>
				<div id="btn">
					<a href="listematiere.php"><button type="submit" class="btn btn-primary"><span class="
glyphicon glyphicon-floppy-disk" style="padding-right: 20px;"></span>Enregistrer</button>
					
<a href="listematiere.php" class="btn btn-primary" role="button" title="listeabsencet"><span class="
glyphicon glyphicon-th-list" style="padding-right: 20px;"></span>Retourner a la liste des matieres</a>
					<input type="hidden" name="Enregistrer" value="1">
				</div>
				</form>
				<?php
										if(isset($_POST["Enregistrer"])){
											$code=$_POST["code"];
											$nom=$_POST["nom"];
											$id=$_POST["idprof"];
											$req="insert into matiere value('$code','$nom')";
											$req2="insert into ensegner2 value('$code','$id')";
												try {
												    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
												        $stmt=$dbh->prepare($req);
												        $stmt->execute();
												        $stm=$dbh->prepare($req2);
												        $stm->execute();

												       echo '<script> window.location = "listematiere.php" </script>';
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