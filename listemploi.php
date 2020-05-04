
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include("cadre.php") ?>
		<div class="panel panel-primary affichage navbar-fixed-top" style="border: none;">
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Liste Emploies</div>
		  <div class="panel-body a2">
			<?php
				try{
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
				        $stmt=$dbh->prepare("SELECT n.Id_emploi2,e.image,Nomniveau,Nomfiliere FROM Emploi2 e,Niveau n ,Filiere f where n.Id_filiere=f.Id_filiere and e.Id_emploi=n.Id_emploi2");
				        $stmt->execute();
			?>
			<div class="btn a7">
				<a href="listemploi2.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%;"></span>liste emplois</button></a>	
				<a href="listemploi.php"><button type="button" class="btn btn-outline a8"><span class="glyphicon glyphicon-th-list" style="font-size: 85%;"></span>Liste emploi par classe</button></a>
		 	</div>
			<table class="table table-hover">
  				<thead>
    				<tr>
				      <th scope="col">ISBN</th>
				      <th scope="col">CLASSE</th>
				      <th scope="col">FILIERE</th>
				      <th scope="col">EMPLOI</th>
				    </tr>
				 </thead>
				 <tbody style="overflow: scroll;">
    				<?php
				        while($ligne=$stmt->fetch()){
				        	echo "<tr>";
				        	echo "<td>".$ligne["Id_emploi2"]."</td>";
				        	echo "<td>".$ligne["Nomniveau"]."</td>";
				        	echo "<td>".$ligne["Nomfiliere"]."</td>";
				        	echo "<td><a href='".$ligne["image"]."' target=\"_blank\"><i class=\"glyphicon glyphicon-calendar\" style=\"font-size:48px;\"></i>
</td>";
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