
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php include("cadre.php") ?>
		<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Liste des matieres</div>
		  <div class="panel-body a2">
			<?php
				try{
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
				        $stmt=$dbh->prepare("SELECT m.Id_matiere,Nom,id_prof FROM matiere m,ensegner2 e where m.Id_matiere=e.Id_matier");
				        $stmt->execute();
			?>
			<table class="table table-hover">
  				<thead>
    				<tr>
				      <th scope="col">ID</th>
				      <th scope="col">MATIERE</th>
				      <th scope="col">CODE PROFEESSEUR</th>
				    </tr>
				 </thead>
				 <tbody style="overflow: scroll;">
    				<?php
				        while($ligne=$stmt->fetch()){
				        	echo "<tr>";
				        	echo "<td>".$ligne["Id_matiere"]."</td>";
				        	echo "<td>".$ligne["Nom"]."</td>";
				        	echo "<td>".$ligne["id_prof"]."</td>";
				        	echo '<td><div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
									    <span class="caret"></span></button>
									    <ul class="dropdown-menu">
									      <li><a href="modifiermatiere.php?id='.$ligne["Id_matiere"].'">Modifier</a></li>
									      <li><a href="suppressionmatiere.php?id='.$ligne["Id_matiere"].'">Supprimer</a></li>
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
</body>
</html>