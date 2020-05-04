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
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Liste Classes</div>
		 	<div class="btn a7">
				<a href="ajoutclasse.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-plus" style="font-size: 85%;"></span>Ajouter classe</button></a>	
				<a href="listeclasse.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%;"></span>Liste des classes</button></a>
		 		<a href="ajoutfiliere.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-plus" style="font-size: 85%;"></span>Ajouter filiere</button></a>	
				<a href="listefiliere.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%;"></span>Liste des filieres</button></a>
		 	</div>
		  <div class="panel-body a9">
			<?php
				try{
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
				        $stmt=$dbh->prepare("SELECT Id_niveau,Nomniveau,Nomfiliere,id_emploi2 FROM Niveau n ,Filiere f where n.Id_filiere=f.Id_filiere");
				        $stmt->execute();
			?>
			<table class="table table-hover">
  				<thead>
    				<tr>
				      <th scope="col">#</th>
				      <th scope="col">NIVEAU</th>
				      <th scope="col">FILIERE</th>
				       <th scope="col">N°EMPLOIE</th>
				      <th scope="col">OPERATION</th>
				    </tr>
				 </thead>
				 <tbody style="overflow: scroll;">
    				<?php
				        while($ligne=$stmt->fetch()){
				        	echo "<tr  class='showm' rel='d{$ligne['Id_niveau']}'>";
				        	echo "<td>".$ligne["Id_niveau"]."</td>";
				        	echo "<td>".$ligne["Nomniveau"]."</td>";
				        	echo "<td>".$ligne["Nomfiliere"]."</td>";
				        	echo "<td>".$ligne["id_emploi2"]."</td>";
				        	echo '<td><div class="dropdown"><button class="btn cancel btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
									    <span class="caret"></span></button>
									    <ul class="dropdown-menu">
									      <li><a href="suppressionclasse.php?id='.$ligne["Id_niveau"].'">Supprimer</a></li>
									    </ul>
									  </div>
							</div></td>';
							echo "</tr>";
						}

					?>
				</tbody>
			</table>
						<?php
							}
							catch(PDOException $e)
							    {
							         echo  $e->getMessage();
							    }
						?>

					  </div>
					</div>
					
			<?php
				$stm = $dbh->prepare("SELECT * FROM Niveau");
				$stm->execute();

				while($ligne = $stm->fetch()) :
			?>
			<div class="modalx" id="d<?= $ligne['Id_niveau'] ?>" style="width: 814px;">
						<div class="card" style="border:none;background-color: white;">
							<div class="panel panel-default cader" style="width: 97%;">
								<div class="panel-heading">
							    	<h3 class="panel-title">Modification de classe</h3>
								</div>
								<div class="panel-body">
									<form action="" method="post">
								    	<div class="part" style="margin-right: 10%;">
								    		<div>
								    			ID_classe: 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $ligne['Id_niveau']?>"  name="id_classe">
									    	</div>
								    		<div>
								    			Nom de classe: 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $ligne['Nomniveau']?>"  name="nomclasse">
									    	</div>
								    		<div>
								    			ID_filiere:
								    			 <input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;"value="<?php echo $ligne['Id_filiere']?>" name="id_filiere">
								    		</div>
								    		<div>	
									    		ID_emploie : 
									    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $ligne['Id_emploi']?>" name="id_emploie">
								    		</div>
								    	</div>
								  </div>
								    	
								</div>
							</div>
							<div id="btn">
								<button type="submit" class="btn btn-primary"><span class="
			glyphicon glyphicon-floppy-disk"></span>Modifier</button>
								
			<a href="listeclasse.php" class="btn btn-primary" role="button" title="listeetudiant"><span class="
			glyphicon glyphicon-th-list"></span>Annuler</a>
								<input type="hidden" name="Modifier" value="1">
							</div>
							</form>
							<?php
											
											if(isset($_POST["Modifier"])){
											$id_filiere=$ligne["id_filiere"];
											$nomclasse=$_POST["nomclasse"];
											$id_classe=$_POST["id_classe"];
											$id_emploi=$_POST["id_emploi2"];
											$req="update niveau set Id_filiere='".$id_filiere."',Nomclasse='".$nomclasse."',Id_emploi2='".$id_emploi."' where Id_niveau='".$id_classe."'";
											echo "$req";
												try {
												    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
												        $stmt=$dbh->prepare($req);
												        $stmt->execute();
												        echo '<script> window.location = "listeclasse.php" </script>';
												   }				
												catch(PDOException $e)
												    {
												         echo  $e->getMessage();
												    }
										}
											?>		
						</div>

					</div>
			</div>

			<?php endwhile; ?>
			<div class="bg"></div>
			 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script type="text/javascript">
				$(function(){
					$('.modalx').hide();
					$('.showm').click(function(e){
						if( !($(e.target).hasClass('cancel')) ){
       				var reff = $(this).attr('rel');
        			$(".modalx#"+reff).fadeIn();
       				$(".bg").fadeIn();}
					});

					$('.modalx .close').click(function(){ $(this).parent().fadeOut(); $('.bg').fadeOut(); })
					$('.bg').click(function(){ $('.modalx').fadeOut(); $('.bg').fadeOut(); })
				});
			</script>
			 
			</body>
			</html>