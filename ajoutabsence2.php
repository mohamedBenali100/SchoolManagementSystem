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
		  		<span class="glyphicon glyphicon-plus"></span>Ajouter une nouvelle classe
			</div>
			<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Ajout d'absence</div>
		 	<div class="btn a7">
				<a href="ajoutabcence2.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-plus" style="font-size: 85%;"></span>Ajouter absence</button></a>	
				<a href="listeabsence.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%;"></span>Liste des absences</button></a>
		 	</div>
			<div class="card" style="margin-top: 50px;">
				<div class="panel panel-default cader">
					<div class="panel-heading">
				    	<h3 class="panel-title"><span class ="
glyphicon glyphicon-info-sign"></span>Formulaire d'ajout d'absence</h3>
					</div>
					<div class="panel-body">
									<form action="" method="post">
								    	<div class="part" style="margin-right: 10%;">
								    		<div>
								    			ID : 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="#" name="id">
									    	</div>
								    	</div>
								    	<div class="part">
								    		<div>	
									    		Code etudiant: 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="CNE" name="cne">
								    		</div>
								    		<div>	
									    		Date d'absence : 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="23/02/2019" name="date">
								    		</div>
								    		<div>
								    			Nombre d'heures: 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="2" name="nbh">
								    		</div>
								    		<div>
								    			Justification: 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="malade" name="justification">
								    		</div>
								    	</div>
								</div>
							</div>
				<div id="btn">
					<a href="listeabsence.php"><button type="submit" class="btn btn-primary"><span class="
glyphicon glyphicon-floppy-disk" style="padding-right: 20px;"></span>Enregistrer</button>
					
<a href="listeabsence.php" class="btn btn-primary" role="button" title="listeabsencet"><span class="
glyphicon glyphicon-th-list" style="padding-right: 20px;"></span>Retourner a la liste des absences</a>
					<input type="hidden" name="Enregistrer" value="1">
				</div>
				</form>
				<?php
										if(isset($_POST["Enregistrer"])){
											$cne=$_POST["cne"];
											$date=$_POST["date"];
											$nbh=$_POST["nbh"];
											$id=$_POST["id"];
											$justification=$_POST["justification"];
											$req="insert into absence value('$id','$date','$nbh','$justification','$cne')";
												try {
												    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
												        $stmt=$dbh->prepare($req);
												        $stmt->execute();
												        echo '<script> window.location = "listeabsence.php" </script>';
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