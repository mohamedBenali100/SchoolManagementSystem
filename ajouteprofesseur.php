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
		  		<span class="glyphicon glyphicon-plus"></span>Ajouter un nouveau professeur
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
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="CIN" name="cin">
						    	</div>
						    	<div>
						    		Nom : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="Nom" name="nom">
					    		</div>
					    		<div>	
						    		Prenom : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="Prenom" name="prenom">
					    		</div>
					    		<div>	
						    		Telephone : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="Telephone" name="tele">
					    		</div>
					    	</div>
					    	<div class="part">
					    		<div>
					    			Sexe:
					    			 <select class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" name="sexe">
								        <option value="homme">HOMME</option>
								        <option value="femme">FEMME</option>
								     </select>
					    		</div>
					    		<div>	
						    		Adresse : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="Adresse" name="add">
					    		</div>
					    		<div>	
						    		Email : 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="Email" name="email">
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
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="Code" name="code">
					    		</div>
					    	</div>
					    	<div class="part">
					    		<div>	
						    		Specialite 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" placeholder="Specialite" name="Specialite">
					    		</div>
					    	</div>
					</div>
				</div>
				<div id="btn">
					<a href="listeprof.php"><button type="submit" class="btn btn-primary"><span class="
glyphicon glyphicon-floppy-disk"></span>Enregistrer</button>
					
<a href="listeprof.php" class="btn btn-primary" role="button" title="listeetudiant"><span class="
glyphicon glyphicon-th-list"></span>Retourner a la liste des professeurs</a>
					<input type="hidden" name="Enregistrer" value="1">
				</div>
				</form>
				<?php
							if(isset($_POST["Enregistrer"])){
								$code=$_POST["code"];
								$nom=$_POST["nom"];
								$prenom=$_POST["prenom"];
								$email=$_POST["email"];
								$sexe=$_POST["sexe"];
								$adresse=$_POST["add"];
								$classe=$_POST["classe"];
								$cin=$_POST["cin"];
								$tele=$_POST["tele"];
								$Specialite=$_POST["Specialite"];
								$req="insert into professeur value('$code','$nom','$prenom','$Specialite','$cin','$adresse','$tele','$sexe','$email')";
									try {
									    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
									        $stmt=$dbh->prepare($req);
									        $stmt->execute();
									        echo '<script> window.location = "listeprof.php" </script>';
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