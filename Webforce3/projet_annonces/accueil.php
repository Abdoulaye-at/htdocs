<?php
  require_once('/inc/init.inc.php');

  //------------------- TRAITEMENT -------------------//
  // Affichage du formulaire

  // Affichage des annonces
  $resultat = executeRequete("SELECT * FROM annonce");

  while($annonce = $resultat->fetch(PDO::FETCH_ASSOC)){

    $contenu_droite .='<div class="col-sm-6 col-lg-6 col-md-6">';
      $contenu_droite .= '<div class="thumbnail">';
        $contenu_droite .= '<a href="fiche_annonce.php?id_annonce='. $annonce['id_annonce'] .'"><img src="'. $annonce['photo'] .'" width="130" height="100"></a>';

        $contenu_droite .= '<div class="caption">';
          $contenu_droite .= '<h4 class="pull-right">'. $annonce['prix'] .' €</h4>';
          $contenu_droite .= '<h4>'. $annonce['titre'] .'</h4>';
          $contenu_droite .= '<p>'. $annonce['descCourte'] .'</p>';
        $contenu_droite .= '</div>';
      $contenu_droite .= '</div>';
    $contenu_droite .= '</div>';
  }

  //------------------- AFFICHAGE -------------------//
  require_once('/inc/haut.inc.php');
  ?>
  <div class="row">
    <div class="col-md-3">
      <?php echo $contenu_gauche; ?>
    </div>

    <div class="col-md-9">
      <div class="row">
        <?php echo $contenu_droite; ?>
      </div>
    </div>
  </div>

  <form class="form-horizontal">
    <fieldset>

    <!-- Form Name -->
    <legend>Affinez votre recherche</legend>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Catégorie</label>
      <div class="col-md-4">
        <select id="selectbasic" name="selectbasic" class="form-control">
          <option value="1">Option one</option>
          <option value="2">Option two</option>
        </select>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Ville">Ville</label>
      <div class="col-md-4">
        <select id="Ville" name="Ville" class="form-control">
          <option value="">Ville</option>
        </select>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Membre">Membre</label>
      <div class="col-md-4">
        <select id="Membre" name="Membre" class="form-control">
          <option value="1">Option one</option>
          <option value="2">Option two</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Prix min</label>
      <div class="col-md-4">
        <select class="form-control">';
          <?php
            for($j = 1000; $j <= 15000; $j+=1000) {
              print "<option> $j </option>";
            }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="selectbasic">Prix max</label>
      <div class="col-md-4">
        <select class="form-control">';
          <?php
            for($j = 1000; $j <= 15000; $j+=1000) {
              print "<option> $j </option>";
            }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for=""></label>
      <div class="col-md-4">
        <button id="" name="" class="btn btn-default">Valider</button>
      </div>
    </div>
    </fieldset>
  </form>


<?
  require_once('/inc/bas.inc.php');
