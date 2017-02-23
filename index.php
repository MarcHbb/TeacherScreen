<?php
	include("fonctions.inc.php");
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">   
    <title></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="main_container">

		<?php foreach($liste_intervenants as $int => $inter) {
			?>
			<div class="prof">

                <h4><?php echo $inter['nom'] ?></h4>

                <?php 

				if (!isset($inter['ical_key'])) {
					?>
					<p>Pas de Calendrier défini</p>
					<?php
				} else {
					?>
					<p>Occupé : <?php 
						 $occupe = etat_occupation_intervenant($inter);
					
						echo $occupe;
					 ?></p>
                     
                     <p><a href="./agenda.php?prof=<?=$int?>">Agenda</a></p>
                 <?php } ?>
            </div>	
			<?php
		} ?>
       

    </div>

  </body>
</html>
