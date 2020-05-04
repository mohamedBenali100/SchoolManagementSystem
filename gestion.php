<div class="panel-body a2">
			<?php
				try {
				    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
				    $requ="SELECT Id_etudiant,Nom,Prenom,Email FROM etudiant where Id_niveau='".$l["Id_niveau"]."'";
				        $stmt=$dbh->prepare($requ) ;
				        $stmt->execute();
			?>
							<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">CODE ETUDIANT</th>
				      <th scope="col">NOM</th>
				      <th scope="col">PRENOM</th>
				      <th scope="col">EMAIL</th>
				      <th scope="col">OPERATION</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php
								        while($ligne=$stmt->fetch()){
								        	echo "<tr class='showm' rel='d{$ligne['Id_etudiant']}'>";
								        	echo "<td>".$ligne["Id_etudiant"]."</td>";
								        	echo "<td>".$ligne["Nom"]."</td>";
								        	echo "<td>".$ligne["Prenom"]."</td>";
								        	echo "<td>".$ligne["Email"]."</td>";
								        	echo '<td>                                          
				  <div class="dropdown">
				    <button class="btn cancel btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
				    <span class="caret"></span></button>
				    <ul class="dropdown-menu">
				      <li><a class="cancel" href="modifieretudiant.php?id='.$ligne["Id_etudiant"].'">Modifier</a></li>
				      <li><a class="cancel" href="suppressionetudiant.php?id='.$ligne["Id_etudiant"].'">Supprimer</a></li>
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
		
<?php
	$stm = $dbh->prepare("SELECT * FROM etudiant");
	$stm->execute();

	while($ligne = $stm->fetch()) :
?>
<div class="modalx" id="d<?= $ligne['Id_etudiant'] ?>" style="top:28%;left:28%">
	<a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
	<div class="tab" style="border:none;background:none;margin-left:150px;">
		<div class="round"><i class="glyphicon glyphicon-user"></i></div>
		<h2><?= $ligne['Nom'] ?></h2>
	</div>
	<ul>
		<li><b style="background:#9b59b6;">Cin</b> <span><?php echo $ligne['CIN'] ?></span></li>
		<li><b style="background:#3498db;">Cne</b> <span><?php echo $ligne['Id_etudiant'] ?></span></li>
		<li><b style="background:#2980b9;">Nom</b> <span><?php echo $ligne['Nom'] ?></span></li>
		<li><b style="background:#27ae60;">Prenom</b> <span><?= $ligne['Prenom'] ?></span></li>
		<li><b style="background:#27ae60;">Adresse</b> <span><?= $ligne['Adresse'] ?></span></li>
		<li><b style="background:#e67e22;">Email</b> <span><?= $ligne['Email'] ?></span></li>
		<li><b style="background:#f1c40f;">Telephone</b> <span><?= $ligne['Num_tele'] ?></span></li>
		<li><b style="background:#1abc9c;">Sexe</b> <span><?= $ligne['Sex'] ?></span></li>
		<li><b style="background:#c0392b;">Classe</b> <span><?= $ligne['Id_niveau'] ?></span></li>
	</ul>
</div>

<?php endwhile; ?>
<div class="bg"></div>
