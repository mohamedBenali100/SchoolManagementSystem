<html>
<head>
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php include("cadre.php") ?>
		<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Absence</div>
		  <div class="panel-body a2">
			<?php
				try{
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
				        $stmt=$dbh->prepare("SELECT Id_absence,Date,Nb_heur,Justification,Id_etudiant FROM absence");
				        $stmt->execute();
			?>
			<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
			<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;">
		  		<span class="glyphicon glyphicon-plus"></span>Ajouter une nouvelle absence
			</div>
			<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Liste des absences</div>
		 	<div class="btn a7">
				<a href="ajoutabsence2.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-plus" style="font-size: 85%;padding-right: 15px;"></span>Ajouter absence</button></a>	
				<a href="listeabsence.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%; padding-right: 15px;"></span>Liste des absences</button></a>
		 	</div>
			<table class="table table-hover">
  				<thead>
    				<tr>
				      <th scope="col">#</th>
				      <th scope="col">CNE</th>
				      <th scope="col">Date d'absence</th>
				      <th scope="col">Nombre d'heures</th>
				      <th scope="col">Justification</th>
				      <th scope="col">OPERATION</th>
				    </tr>
				 </thead>
				 <tbody style="overflow: scroll;">
    				<?php
				        while($ligne=$stmt->fetch()){
				        	echo "<tr>";
				        	echo "<td>".$ligne["Id_absence"]."</td>";
				        	echo "<td>".$ligne["Id_etudiant"]."</td>";
				        	echo "<td>".$ligne["Date"]."</td>";
				        	echo "<td>".$ligne["Nb_heur"]."</td>";
				        	echo "<td>".$ligne["Justification"]."</td>";
				        	echo '<td><div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
									    <span class="caret"></span></button>
									    <ul class="dropdown-menu">
									      <li><a href="suppressionabsence.php?id='.$ligne["Id_absence"].'">Supprimer</a></li>
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