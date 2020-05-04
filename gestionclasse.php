<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet"  href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 12%;
  height: 100%;
  margin-top: 70px;
  margin-left: 200px;


}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
  padding-bottom: 30%;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ddd;
  width: 70%;
  border-left: none;
  height: 300px;
  margin-left: 50%;
}
</style>
</head>
<body >

  <?php include("cadre.php") ?>

    <div class="panel panel-primary affichage navbar-fixed-top" style="
    border: none;">
      <div class="panel-heading a1"style="
    background-color: #cdcdcd;border:none;><span class="glyphicon glyphicon-list"></span>Liste des classes
      
      </div>
        <?php
        try {
            $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
                $stmt=$dbh->prepare("SELECT Nomniveau FROM niveau") ;
                $stmt->execute();
      ?>
      <div class="tab" style="margin-left: 10%;padding-bottom:300px;overflow: scroll;">
      <?php         
                 while($ligne=$stmt->fetch()){
                          echo " <button class=\"tablinks\" onclick=\"openCity(event, '".$ligne["Nomniveau"]."')\" id=\"defaultOpen\"><span class=\"glyphicon glyphicon-credit-card\" style=\"margin-left: 30%;
    font-size: 300%;\"></span><div style=\"text-align: center;\"><b>".$ligne["Nomniveau"]."</div></button>";
                        }?>
        </div>
           <?php
        try {
            $dbh=new PDO("mysql:host=localhost;dbname=gestion_ecole",'root',''); 
                $sttm=$dbh->prepare("SELECT * FROM niveau") ;
                $sttm->execute();
      ?>
         <?php
                  while($l=$sttm->fetch()){ 
                          echo "<div id='".$l["Nomniveau"]."' class=\"tabcontent\"style=\"display: block;position: absolute;top: 12%;margin-left: 22%;height:100%;\">
                                <h3>".$l["Nomniveau"]."</h3>
                               ";
                                include("gestion.php");

                                  echo "</div>";
                        }?>
        <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        </script>
           <?php
        }
        catch(PDOException $e)
            {
                 echo  $e->getMessage();
            }
    ?>
       <?php
        }
        catch(PDOException $e)
            {
                 echo  $e->getMessage();
            }
    ?>
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
    $('.close').click(function(){$('.modalx').fadeOut(); $('.bg').fadeOut();})
  });
</script>
</body>
</html> 
