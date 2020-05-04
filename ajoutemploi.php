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
		 	<div class="panel-heading a1"style="background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Ajout d'emploi</div>
		  <div class="panel-body a9">
			<table class="table table-hover">
  		<form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="matricule">ID:</label>
            <input type="text" class="form-control" name="Id_emploi"  >
          </div>
           <div class="form-group">
          <label for="image">Ajouter une image : </label>
            <input type="file"  name="image">
          </div>
          </div>
          <button type="submit" class="btn btn-default" name="Ajouter">Ajouter</button>
          <?php
							if(isset($_POST["Ajouter"])){
								$Id_emploi=$_POST["Id_emploi"];
								$nomfichier=$_FILES["image"]["name"];
								$nomTemp=$_FILES["image"]["tmp_name"];
								$chemin="image/".$nomfichier;
								move_uploaded_file($nomTemp,$chemin);
								$req="insert into emploi2 value('$Id_emploi','$chemin')";
									try {
									    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
									        $stmt=$dbh->prepare($req);
									        $stmt->execute();
									        echo '<script> window.location = "listemploi2.php" </script>';
									   }				
									catch(PDOException $e)
									    {
									         echo  $e->getMessage();
									    }
							}
								?>
           
              </td>
           </form> 
		
		  </div>
		</div>
		</div>
  
			</body>
			</html>