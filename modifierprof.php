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
						$req1="select * FROM professeur where Id_prof = '".$id."'";
						echo "$req1";
						$stm = $dbh->prepare($req1);
						if($stm->execute()){
							$etud = $stm->fetchAll(\PDO::FETCH_ASSOC);
							$etud = $etud[0];
							var_dump($etud);
								$code=$etud["Id_prof"];
								$nom=$etud["Nom"];
								$prenom=$etud["Prenom"];
								$email=$etud["Email"];
								$sexe=$etud["Sex"];
								$adresse=$etud["Adresse"];
								$Specialite=$etud["Specialite"];
								$cin=$etud["CIN"];
								$tele=$etud["Num_tele"];
						}
						var_dump($cin);
						//die();
			?>
		<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
			<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;">
		  		<span class="glyphicon glyphicon-plus"></span>Modifier professeur
			</div>
			<div class="card">
				<div class="panel panel-default cader">
					<div class="panel-heading">
				    	<h3 class="panel-title"><span class ="
glyphicon glyphicon-info-sign"></span>Informations Personnelle</h3>
					</div>
					<div class="panel-body">
						<form action="" method="post">
					    	<div class="part" style="margin-right: 10%;">
					    		<div>
					    			CIN : 
						    		<input 
						    		type="text" 
						    		class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $cin;?>" name="cin">
						    	</div>
						    	<div>
						    		Nom : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo$nom;?>" name="nom">
					    		</div>
					    		<div>	
						    		Prenom : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $prenom;?>" name="prenom">
					    		</div>
					    		<div>	
						    		Telephone : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $tele;?>" name="tele">
					    		</div>
					    	</div>
					    	<div class="part">
					    		<div>
					    			Sexe:
					    			 <select class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" name="sexe" value="<?php echo $sexe;?>">
								        <option value="homme">HOMME</option>
								        <option value="femme">FEMME</option>
								     </select>
					    		</div>
					    		<div>	
						    		Adresse : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $adresse;?>" name="add">
					    		</div>
					    		<div>	
						    		Email : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $email;?>" name="email">
					    		</div>
					    	</div>
					</div>
				</div>
				<div class="panel panel-default cader">
					<div class="panel-heading">
				    	<h3 class="panel-title"><span class ="
glyphicon glyphicon-info-sign"></span>Informations Universitaire</h3>
					</div>
					<div class="panel-body">
					    	<div class="part" style="margin-right: 10%;">
					    		<div>	
						    		Code professeur : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value=<?php echo"$code";?> name="code">
					    		</div>
					    	</div>
					    	<div class="part">
					    		<div>	
						    		Specialite : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $Specialite; ?>" name="Specialite">
					    		</div>
					    	</div>
					</div>
				</div>
				<div id="btn">
					<button type="submit" class="btn btn-primary"><span class="
glyphicon glyphicon-floppy-disk"></span>Modifier</button>
					
<a href="listeprof.php" class="btn btn-primary" role="button" title="listeprof"><span class="
glyphicon glyphicon-th-list"></span>Annuler</a>
					<input type="hidden" name="Modifier" value="1">
				</div>
				</form>
				<?php
								
	
							if(isset($_POST["Modifier"])){
								$code=$_POST["code"];
								$nom=$_POST["nom"];
								$prenom=$_POST["prenom"];
								$email=$_POST["email"];
								$sexe=$_POST["sexe"];
								$adresse=$_POST["add"];
								$Specialite=$_POST["Specialite"];
								$cin=$_POST["cin"];
								$tele=$_POST["tele"];
								$req="update professeur set CIN='$cin',Nom='$nom',Prenom='$prenom',Email='$email',Sex='$sexe',Adresse='$adresse',Specialite='$Specialite',Num_tele='$tele' where Id_prof='$id'";
										echo '<script> window.location = "listeprof.php" </script>';
									try {
										    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root','');
										     $stmt=$dbh->prepare($req);
									        $stmt->execute();
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