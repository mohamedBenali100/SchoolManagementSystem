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
						$req1="select * FROM etudiant where Id_etudiant = '".$id."'";
						echo "$req1";
						$stm = $dbh->prepare($req1);
						if($stm->execute()){
							$etud = $stm->fetchAll(\PDO::FETCH_ASSOC);
							$etud = $etud[0];
							var_dump($etud);
								$cne=$etud["Id_etudiant"];
								$nom=$etud["Nom"];
								$prenom=$etud["Prenom"];
								$email=$etud["Email"];
								$sexe=$etud["Sexe"];
								$adresse=$etud["Adresse"];
								$classe=$etud["classe"];
								$cin=$etud["CIN"];
								$tele=$etud["Num_tele"];
								$classe=$etud["Id_niveau"];
							echo"$nom";
						}
						var_dump($cin);
						//die();
			?>
		<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
			<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;">
		  		<span class="glyphicon glyphicon-plus"></span>Modifier etudant
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
						    		Code national etudiant : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value=<?php echo"$cne";?> name="cne">
					    		</div>
					    	</div>
					    	<div class="part">
					    		<div>	
						    		Classe 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $classe; ?>" name="classe">
					    		</div>
					    	</div>
					</div>
				</div>
				<div id="btn">
					<button type="submit" class="btn btn-primary"><span class="
glyphicon glyphicon-floppy-disk"></span>Modifier</button>
					
<a href="listeetudiant.php" class="btn btn-primary" role="button" title="listeetudiant"><span class="
glyphicon glyphicon-th-list"></span>Annuler</a>
					<input type="hidden" name="Modifier" value="1">
				</div>
				</form>
				<?php
							if(isset($_POST["Modifier"])){
								$cne=$_POST["cne"];
								$nom=$_POST["nom"];
								$prenom=$_POST["prenom"];
								$email=$_POST["email"];
								$sexe=$_POST["sexe"];
								$adresse=$_POST["add"];
								$classe=$_POST["classe"];
								$cin=$_POST["cin"];
								$tele=$_POST["tele"];
								$classe=$_POST["classe"];
								$req="update etudiant set CIN='$cin',Nom='$nom',Prenom='$prenom',Email='$email',Sex='$sexe',Adresse='$adresse',Id_niveau='$classe',CIN='$cin',Num_tele='$tele' where Id_etudiant='$cne'";
								echo '<script> window.location = "listeetudiant.php" </script>';
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