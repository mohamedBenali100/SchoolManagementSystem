<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include("cadre.php") ?>
			<?php
			$id=$_GET['id'];
				try {
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root','');
				}
				catch(PDOException $e)
				    {
				         echo  $e->getMessage();
				    }
						$req1="SELECT m.Id_matiere,Nom,id_prof FROM matiere m,ensegner2 e where m.Id_matiere=e.Id_matier";
						$stm = $dbh->prepare($req1);
						if($stm->execute()){
							$etud = $stm->fetchAll(\PDO::FETCH_ASSOC);
							$etud = $etud[0];
							var_dump($etud);
								$id=$etud["Id_matiere"];
								$nom=$etud["Nom"];
								$idprof=$etud["id_prof"];
						}
						var_dump($id);
			?>
		<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
			<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;">
		  		<span class="glyphicon glyphicon-plus"></span>Matiere
			</div>
			<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>modifier la matiere</div>
			<div class="card" style="margin-top: 50px;">
				<div class="panel panel-default cader">
					<div class="panel-heading">
				    	<h3 class="panel-title"><span class ="
glyphicon glyphicon-info-sign"></span>Formulaire de modification du matiere</h3>
					</div>
					<div class="panel-body">
									<form action="" method="post">
								    	<div class="part" style="margin-right: 10%;">
								    		<div>	
									    		Code matiere: 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo "$id" ?>" name="code">
								    		</div>
								    	</div>
								    	<div class="part">
								    		<div>	
									    		Nom du matiere : 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo "$nom" ?>"  name="nom">
								    		</div>
								    		<div>
								    			Affecter à : 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo "$idprof" ?>"  name="idprof">
								    		</div>
								    	</div>
								</div>
							</div>
				<div id="btn">
					<a href="listematiere.php"><button type="submit" class="btn btn-primary"><span class="
glyphicon glyphicon-floppy-disk" style="padding-right: 20px;"></span>Modifier</button>
					
<a href="listematiere.php" class="btn btn-primary" role="button" title="listeabsencet"><span class="
glyphicon glyphicon-th-list" style="padding-right: 20px;"></span>Annuler</a>
					<input type="hidden" name="Modifier" value="1">
				</div>
				</form>
				<?php
										if(isset($_POST["Modifier"])){
											$id=$_POST["code"];
											$nom=$_POST["nom"];
											$idprof=$_POST["idprof"];
											$req="update matiere set Id_matiere='$id',nom='$nom' where Id_matiere='$id'";
											$req2="update ensegner2 set Id_matiere='$id',id_prof='$idprof' where Id_matier='$id' and id_prof='$idprof')";
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