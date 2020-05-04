
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include("cadre.php") ?>
		<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Liste des filieres</div>
		  <div class="panel-body a2">
			<?php
				try{
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
				        $stmt=$dbh->prepare("SELECT Id_filiere,Nomfiliere FROM Filiere");
				        $stmt->execute();
			?>
			<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
			<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;">
		  		<span class="glyphicon glyphicon-plus"></span>Ajouter une nouvelle filiere
			</div>
			<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Liste filieres</div>
		 	<div class="btn a7">
				<a href="ajoutclasse.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-plus" style="font-size: 85%;"></span>Ajouter classe</button></a>	
				<a href="listeclasse.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%;"></span>Liste des classes</button></a>
		 		<a href="ajoutfiliere.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-plus" style="font-size: 85%;"></span>Ajouter filiere</button></a>	
				<a href="listefiliere.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%;"></span>Liste des filieres</button></a>

		 	</div>
			<table class="table table-hover">
  				<thead>
    				<tr>
				      <th scope="col">#</th>
				      <th scope="col">FILIERE</th>
				      <th scope="col">OPERATION</th>
				    </tr>
				 </thead>
				 <tbody style="overflow: scroll;">
    				<?php
    				$a=1;
				        while($ligne=$stmt->fetch()){
				        	if($a!=1){
				        	echo "<tr class='showm' rel='d{$ligne['Id_filiere']}'>";}
				        	else{
				        		echo "<tr>";
				        	}
				        	echo "<td>".$ligne["Id_filiere"]."</td>";
				        	echo "<td>".$ligne["Nomfiliere"]."</td>";
				        	if($a!=1){
				        	echo '<td><div class="btn"><button class="btn btn-primary" type="button"  class="cancel" href="suppressionfiliere.php?id='.$ligne["Id_filiere"].'">Supprimer
							</div></td>';
						;}
							$a++;
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
	$stm = $dbh->prepare("SELECT * FROM filiere");
	$stm->execute();

	while($ligne = $stm->fetch()) :
?>
<div class="modalx" id="d<?= $ligne['Id_filiere'] ?>" style="width: 814px;">
			<div class="card" style="border:none;background-color: white;">
				<div class="panel panel-default cader" style="width: 97%;">
					<div class="panel-heading">
				    	<h3 class="panel-title">Modification de filiere</h3>
					</div>
					<div class="panel-body">
						<form action="" method="post">
					    	<div class="part" style="margin-right: 10%;">
					    		<div>
					    			ID_filiere: 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $ligne['Id_filiere']?>"  name="id_filiere">
						    	</div>
					    		<div>
					    			Nom de filiere: 
						    		<input type="text" class="form-control" style="width: 60%;display: inline-block; margin-left: 10px;" value="<?php echo $ligne['Nomfiliere']?>"  name="Nomfiliere">
						    	</div>
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
								$id_filiere=$ligne["id_filiere"];
								$Nomfiliere=$_POST["Nomfiliere"];
								$req="update niveau set Id_filiere='".$id_filiere."',Nomfiliere='".$Nomfiliere."' where Id_filiere='".$id_filiere."'";
								echo "$req";
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
</div>

<?php endwhile; ?>
<div class="bg"></div>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function(){
		//$('.modalx').hide();
		$('.showm').click(function(e){
			if( !($(e.target).hasClass('cancel')) ){
        var reff = $(this).attr('rel');
        $(".modalx#"+reff).fadeIn();
        $(".bg").fadeIn();
			}
		});
		$('.modalx .close').click(function(){ $(this).parent().fadeOut(); $('.bg').fadeOut(); })
		$('.bg').click(function(){ $('.modalx').fadeOut(); $('.bg').fadeOut(); })
	});
</script>
 
</body>
</html>