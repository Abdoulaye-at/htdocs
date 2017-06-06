<?php
//-------------------TRAITEMENT-------------------//
require_once('inc/init.inc.php');
$inscription = false; // pour ne pas afficher le formulaire une fois le membre inscrit

debug($_POST);

// Traitement du formulaire //
if(!empty($_POST)){
  // Contrôles :
  if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20){
    $contenu .= '<div class="bg-danger">Le pseudo doit contenir entre 4 et 20 caractères.</div>';
  }
  if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20){
    $contenu .= '<div class="bg-danger">Le mot de passe doit contenir entre 4 et 20 caractères.</div>';
  }
  if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20){
    $contenu .= '<div class="bg-danger">Le nom doit contenir entre 2 et 20 caractères.</div>';
  }
  if(strlen($_POST['prenom']) < 4 || strlen($_POST['prenom']) > 20){
    $contenu .= '<div class="bg-danger">Le prenom doit contenir entre 4 et 20 caractères.</div>';
  }
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $contenu .= '<div class="bg-danger">L\'email n\'est pas valide !</div>';
  }
  if(!isset($_POST['civilite']) || ($_POST['civilite'] =! 'm' && $_POST['civilite'] =! 'f')){
    $contenu .= '<div class="bg-danger">Erreur de civilité !</div>';
  }
  if(strlen($_POST['ville']) < 1 || strlen($_POST['ville']) > 20){
    $contenu .= '<div class="bg-danger">La ville doit contenir entre 1 et 20 caractères !</div>';
  }
  if(!preg_match('#^[0-9]{5}$#', $_POST['code_postal'])){
    $contenu .= '<div class="bg-danger">Le code postal n\'est pas valide !</div>';
  }
  /*
    La fonction preg_match() vérifie que la chaine de caractères contenue dans le code postal correspond à l'expression régulière. En cas de succès, elle renvoi 1, sinon, elle renvoie 0.
    L'expression régulière utilisée :
    - Elle est encadrée par des #
    - Le ^ donne le début de l'expression
    - Le $  donne la fin de l'expression
    - On définit l'intervalle de chiffres ou de lettres autorisés entre crochets
    - On quantifie le nombre de chiffres souhaités entre accolades
  */
  if(strlen($_POST['adresse']) < 4 || strlen($_POST['adresse']) > 50){
    $contenu .= '<div class="bg-danger">L\'adresse doit contenir entre 4 et 50 caractères !</div>';
  }

  if(empty($contenu)){
    $membre = executeRequete('SELECT * FROM membre WHERE pseudo = :pseudo', array(':pseudo' => $_POST['pseudo']));

    if($membre->rowCount() > 0){
      $contenu .= '<div class="bg-danger">Pseudo indisponible, veuilez en choisir un autre</div>';
    } else {
      executeRequete('INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, 0)',
      array(':pseudo'=>$_POST['pseudo'],
            ':mdp'=>$_POST['mdp'],
            ':nom'=>$_POST['nom'],
            ':prenom'=>$_POST['prenom'],
            ':email'=>$_POST['email'],
            ':civilite'=>$_POST['civilite'],
            ':ville'=>$_POST['ville'],
            ':code_postal'=>$_POST['code_postal'],
            ':adresse'=>$_POST['adresse']));
      $contenu .= '<div class="bg-succes">Vous êtes inscrit sur notre site.<a href="connexion.php">Cliquez ici pour vous connecter</a></div>';
      $inscription = true; // pour ne plus afficher le formulaire
    }
  }
}

//-------------------AFFICHAGE-------------------//
require_once('inc/haut.inc.php');
echo $contenu; // pour afficher les messages

if(!$inscription) :
  // si membre non inscrit, on affiche le formulaire :
  ?>
  <form action="" method="post">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>"><br><br>

    <label for="mdp">Mot de Passe</label><br>
    <input type="password" name="mdp" id="mdp" value=""><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>"><br><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" name="prenom" id="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>"><br><br>

    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"><br><br>

    <label for="civilite">Civilité</label><br>
    <input type="radio" name="civilite" id="homme" value="m"checked><label for="homme">Homme</label>
    <input type="radio" name="civilite" id="femme" value="f" <?php if(isset($_POST['civilite']) && $_POST['civilite'] == 'f') echo 'checked'; ?>><label for="femme"> Femme</label><br><br>

    <label for="ville">Ville</label><br>
    <input type="text" name="ville" id="ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>"><br><br>

    <label for="code_postal">Code Postal</label><br>
    <input type="text" name="code_postal" id="code_postal" value="<?php if(isset($_POST['code_postal'])) echo $_POST['code_postal']; ?>"><br><br>


    <label for="adresse">Adresse</label><br>
    <textarea name="adresse" id="adresse" value="" rows="8" cols="80"><?php if(isset($_POST['adresse'])) echo $_POST['adresse']; ?></textarea><br><br>

    <input type="submit" name="inscription" value="S'inscrire" class="btn">
  </form>

<?php
endif;
require_once('inc/bas.inc.php');
