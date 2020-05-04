<!DOCTYPE html>
<html>
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<title>Welcomme</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="./image/iconhead.png" type="image/x-icon/png/jpg" /> 
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="cc.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="./image/iconhead.png" type="image/x-icon/png/jpg" /> 
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<?php
		include 'cadre.php';
	?>
	<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="hero-widget well well-sm" >
                <div class="icon">
                     <i class="glyphicon glyphicon-user"></i>
                </div>
                <div class="text">
                    <var><?php 
                    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
                        $stmt=$dbh->prepare("SELECT * FROM etudiant");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        echo "$count";
            ?></var>
                    <label class="text-muted">ETUDIANTS</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
           <div class="hero-widget well well-sm" style="height: 230px;"  >
                <div class="icon">
                     <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="text">
                    <var><?php 
                    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
                        $stmt=$dbh->prepare("SELECT * FROM professeur");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        echo "$count";
            ?></var>
                    <label class="text-muted">PROFESSEURS</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-education"></i>
                </div>
                <div class="text">
                       <var><?php 
                    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
                        $stmt=$dbh->prepare("SELECT * FROM niveau");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        echo "$count";
            ?></var>
                    <label class="text-muted">CLASSES</label>
                </div>
            </div>
        </div>
         <div class="col-sm-3">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-briefcase"></i>
                </div>
                <div class="text">
                    <var><?php 
                    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
                        $stmt=$dbh->prepare("SELECT * FROM filiere");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        echo "$count";
            ?></var>
                    <label class="text-muted">FILIERES</label>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-book"></i>
                </div>
                <div class="text">
                    <var><?php 
                    $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
                        $stmt=$dbh->prepare("SELECT * FROM matiere");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        echo "$count";
            ?></var>
                    <label class="text-muted">MATIERES</label>
                </div>
            </div>
        </div>
    </div>
</div>
	
	
</body>
</html>