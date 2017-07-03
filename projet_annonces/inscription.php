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
  if(!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
    $contenu .= '<div class="bg-danger">Veuillez vérifier votre numéro de téléphone</div>';
  }
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $contenu .= '<div class="bg-danger">L\'email n\'est pas valide !</div>';
  }
  if(!isset($_POST['civilite']) || ($_POST['civilite'] =! 'm' && $_POST['civilite'] =! 'f')){
    $contenu .= '<div class="bg-danger">Erreur de civilité !</div>';
  }


  if(empty($contenu)){
    $membre = executeRequete('SELECT * FROM membre WHERE pseudo = :pseudo', array(':pseudo' => $_POST['pseudo']));

    if($membre->rowCount() > 0){
      $contenu .= '<div class="bg-danger">Pseudo indisponible, veuilez en choisir un autre</div>';
    } else {
      $_POST['mdp'] = md5($_POST['mdp']); // on encrypte le mot de passe avec la fonction prédéfinie md5
      executeRequete('INSERT INTO membre (pseudo, mdp, nom, prenom, telephone, email, civilite, statut, date_enregistrement) VALUES (:pseudo, :mdp, :nom, :prenom, :telephone, :email, :civilite, 0, NOW())',
      array(':pseudo'=>$_POST['pseudo'],
            ':mdp'=>$_POST['mdp'],
            ':nom'=>$_POST['nom'],
            ':prenom'=>$_POST['prenom'],
            ':telephone'=>$_POST['telephone'],
            ':email'=>$_POST['email'],
            ':civilite'=>$_POST['civilite'],));
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

    <label for="telephone">Téléphone</label><br>
    <input type="text" name="telephone" id="telephone" value="<?php if(isset($_POST['telephone'])) echo $_POST['telephone']; ?>"><br><br>

    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"><br><br>

    <label for="civilite">Civilité</label><br>
    <input type="radio" name="civilite" id="homme" value="m"checked><label for="homme">Homme</label>
    <input type="radio" name="civilite" id="femme" value="f" <?php if(isset($_POST['civilite']) && $_POST['civilite'] == 'f') echo 'checked'; ?>><label for="femme"> Femme</label><br><br>

    <input type="submit" name="inscription" value="S'inscrire" class="btn">
  </form>

<?php
endif;
require_once('inc/bas.inc.php');
