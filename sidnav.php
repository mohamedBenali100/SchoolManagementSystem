
<div class="sidenav">
		<button class="dropdown-btn">Register des etudiants   
	    <i class="fa fa-caret-down"></i>
	  </button>
	  <div class="dropdown-container">
	    <a href="ajoutetudiant.php"><span class="glyphicon glyphicon-plus"></span>Ajout etudiant</a>
	    <a href="listeetudiant.php"><span class="glyphicon glyphicon-th-list"></span>Liste d'etudiants</a>
	  </div>
	  <button class="dropdown-btn">Corp professionelle
	    <i class="fa fa-caret-down"></i>
	  </button>
	  <div class="dropdown-container">
	    <a href="ajouteprofesseur.php"><span class="glyphicon glyphicon-plus"></span>Ajout professeur</a>
	    <a href="listeprof.php"><span class="glyphicon glyphicon-th-list"></span>Listes des professeurs</a>

	  </div>
	  <button class="dropdown-btn"></span>Registre de classes    
	    <i class="fa fa-caret-down"></i>
	  </button>
	  <div class="dropdown-container">
	    <a href="gestionclasse.php"><span class="glyphicon glyphicon-book"></span>Gestion des Classe</a>
	    <a href="listeclasse.php"><span class="glyphicon glyphicon-th-list"></span>Liste des Classes</a>
	  </div>
	  <button class="dropdown-btn">Matieres               
	    <i class="fa fa-caret-down"></i>
	  </button>
	  <div class="dropdown-container">
	    <a href="ajoutematiere.php"><span class="glyphicon glyphicon-book"></span>Ajout des Matieres</a>
	    <a href="listematiere.php"><span class="glyphicon glyphicon-th-list"></span>Listes des Matieres</a>
	  </div>
	  <button class="dropdown-btn">Emploie de temps     
	    <i class="fa fa-caret-down"></i>
	  </button>
	  <div class="dropdown-container">
	    <a href="ajoutemploi.php"><span class="glyphicon glyphicon-plus"></span>Ajout une emploie</a>
	    <a href="listemploi.php"><span class="glyphicon glyphicon-th-list"></span>Liste des emploies</a>
	  </div>
	  <a href="listeabsence.php">Registre d'absence </a>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
$(function(){
	$('.dropdown-btn').click(function(){	


		if($(this).hasClass('active')) $(this).removeClass('active');
		else{
		$('.dropdown-btn').removeClass('active');
			 $(this).addClass('active');
		}
		var nex = $(this).next();
		$('.dropdown-btn').next().slideUp();

		if(nex.css('display') === 'block' ) nex.slideUp(); 
		else nex.slideDown();
	});
})
</script>




