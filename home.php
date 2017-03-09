    <?php include("fonctions.inc.php"); ?>

<!DOCTYPE html>
<html>

  <head>
    <title>TeacherScreen</title>
    <meta charset="utf-8">   
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">


  </head>

  <body>

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">TeacherScreen</span>
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
          <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Accueil</a>
          <a href="#fixed-tab-2" class="mdl-layout__tab">L405</a>
          <a href="#fixed-tab-3" class="mdl-layout__tab">About</a>
        </div>
      </header>
      <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
          <div class="page-content">
            <br><br><br>
            <h1>Bienvenue sur TeacherScreen!</h1>
            <h3>Une Web App qui permet de lier les professeurs et les élèves de l'ESILV</h3>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
          </div>
        </section>


      <!-- VIGNETTES -->
     
			
    
        <section class="mdl-layout__tab-panel" id="fixed-tab-2">
          <div class="page-content">
            <div class="mdl-grid">
              <?php foreach($liste_intervenants as $int => $inter) { ?>
              <div id="global">
              <div class="mdl-cell mdl-cell--3-col">
                <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title">
                    <i class="material-icons  mdl-list__item-avatar">person</i>
                    <h2 class="mdl-card__title-text"><?php echo $inter['nom']; ?></h2>
                  </div>
                  <div class="mdl-card__supporting-text">
                    Description du professeur ...
                  </div>
                  <div class="mdl-card__supporting-text">
                   <?php
                   if (!isset($inter['ical_key'])) { ?>
                  <font color="grey"><b>Indisponible</b></font>
                    <?php
				              } else { 
                         $occupe = etat_occupation_intervenant($inter);
                        if($occupe == 'Disponible') { ?>
                      <font color="green"><b><?php echo $occupe ?></b></font>
                    <?php } else { ?>
                      <font color="red"><b><?php echo $occupe ?></b></font>
                    <?php } } ?>
     
                  </div>
                  <div class="container">
                    <?php 	if (!isset($inter['ical_key'])) {
                      ?>
                      <p>Pas de Calendrier défini</p>
                      <?php
                    } else { ?>
                    <a href="./agenda.php?prof=<?=$int?>">
                        <button data-toggle="modal" href="#infosprof1" data-backdrop="false" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Emploi du temps
                        </button>
                    </a>
                    <?php } ?>

                  </div>
                </div>
              </div>
              </div>

      <?php } ?>


        </section>
        <section class="mdl-layout__tab-panel" id="fixed-tab-3">
          <div class="page-content"><!-- Your content goes here --></div>
        </section>
      </main>
    </div>
  </body>
</html>
