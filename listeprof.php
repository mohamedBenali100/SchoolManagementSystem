
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
		  <div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Liste Professeurs</div>
		  <div class="panel-body a2">
			<?php
				try{
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
				        $stmt=$dbh->prepare("SELECT Id_prof,Nom,Prenom,Email,Specialite FROM Professeur") ;
				        $stmt->execute();
			?>
			<table class="table table-hover">
  				<thead>
    				<tr>
				      <th scope="col">CODE PROFESSEUR</th>
				      <th scope="col">NOM</th>
				      <th scope="col">PRENOM</th>
				      <th scope="col">EMAIL</th>
				      <th scope="col">SPECIALITE</th>
				      <th scope="col">OPERATION</th>
				    </tr>
				 </thead>
				 <tbody style="overflow: scroll;">
    				<?php
				        while($ligne=$stmt->fetch()){
				        	echo "<tr class='showm' rel='d{$ligne['Id_prof']}'>";
				        	echo "<td>".$ligne["Id_prof"]."</td>";
				        	echo "<td>".$ligne["Nom"]."</td>";
				        	echo "<td>".$ligne["Prenom"]."</td>";
				        	echo "<td>".$ligne["Email"]."</td>";
				        	echo "<td>".$ligne["Specialite"]."</td>";
				        	echo '<td><div class="dropdown"><button class="btn cancel btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
									    <span class="caret"></span></button>
									    <ul class="dropdown-menu">
									      <li><a class="cancel" href="modifierprof.php?id='.$ligne["Id_prof"].'">Modifier</a></li>
									      <li><a  class="cancel" href="suppressionprof.php?id='.$ligne["Id_prof"].'">Supprimer</a></li>
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
	$stm = $dbh->prepare("SELECT * FROM Professeur");
	$stm->execute();

	while($ligne = $stm->fetch()) :
?>
<div class="modalx" id="d<?= $ligne['Id_prof'] ?>">
	<a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
	<div class="tab">
		<div class="round"><i class="glyphicon glyphicon-user"></i></div>
		<h2><?= $ligne['Nom'] ?></h2>
	</div>
	<ul>
		<li><b style="background:#3498db;">Code professeur</b> <span><?php echo $ligne['Id_prof'] ?></span></li>
		<li><b style="background:#9b59b6;">Cin</b> <span><?php echo $ligne['CIN'] ?></span></li>
		<li><b style="background:#2980b9;">Nom</b> <span><?php echo $ligne['Nom'] ?></span></li>
		<li><b style="background:#27ae60;">Prenom</b> <span><?= $ligne['Prenom'] ?></span></li>
		<li><b style="background:#27ae60;">Adresse</b> <span><?= $ligne['Adresse'] ?></span></li>
		<li><b style="background:#e67e22;">Email</b> <span><?= $ligne['Email'] ?></span></li>
		<li><b style="background:#f1c40f;">Telephone</b> <span><?= $ligne['Num_tele'] ?></span></li>
		<li><b style="background:#1abc9c;">Sexe</b> <span><?= $ligne['Sex'] ?></span></li>
		<li><b style="background:#c0392b;">Specialite</b> <span><?= $ligne['Specialite'] ?></span></li>
	</ul>
</div>

<?php endwhile; ?>
<div class="bg"></div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
	$(function(){
		$('.modalx').hide();
		$('.showm').click(function(e){
			if( !($(e.target).hasClass('cancel')) ){
				var reff = $(this).attr('rel');
				$("#"+reff).fadeIn();
				$(".bg").fadeIn();
			}
		});

		$('.modalx .close').click(function(){ $(this).parent().fadeOut(); $('.bg').fadeOut(); })
		$('.bg').click(function(){ $('.modalx').fadeOut(); $('.bg').fadeOut(); })
	});
</script>

 
</body>
</html>
</body>
</html>