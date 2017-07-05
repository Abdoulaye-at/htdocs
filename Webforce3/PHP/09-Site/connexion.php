<?php
require_once 'inc/init.inc.php';

//--------TRAITEMENT--------//

// Déconnexion de l'internaute à sa demande //
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
  session_destroy(); // rappel : cette instruction est executée à la fin du script
}

// Internaute est déja connecté //
if(internauteEstConnecte()){
  // on le renvoie vers sa page de profil
  header('location:profil.php');
  exit(); // la fonction header poursuit jusqu'en fin de script si l'interrompt pas avec 'exit()'
}

// Traitement des données //
if($_POST){
  if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) $contenu.='<div class="bg-danger">Le pseudo est requis</div>';
  if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) $contenu.='<div class="bg-danger">Le mot de passe est requis</div>';
  if(empty($contenu)){
    $mdp = md5($_POST['mdp']); // on crypte le mdp pour le comparer à celui de la bdd

    $resultat = executeRequete("SELECT * FROM membre WHERE mdp = :mdp AND pseudo = :pseudo", array(':mdp' => $mdp, ':pseudo' => $_POST['pseudo']));

    if($resultat -> rowCount() != 0){
      $membre = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car il n'y a qu'une seule combinaison login/mdp possible


      $_SESSION['membre'] = $membre; // on crée une session "membre" avec les éléments provenants de la bdd

      debug($_SESSION['membre']);

      header('location:profil.php');
      exit();

    } else{
      $contenu.= '<div class="bg-danger">Erreur sur les identifiants</div>';
    }
  }
}

//--------AFFICHAGE--------//
require_once 'inc/haut.inc.php';
echo $contenu;
?>

  <h3>Veuiller renseigner vos identifiants pour vous connecter</h3>

  <form action="" method="post">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" value="pseudo"><br><br>

    <label for="mdp">Mot de Passe</label><br>
    <input type="password" name="mdp" value="mdp"><br><br>

    <input type="submit" value="Se connecter" class="btn">
  </form>

<?php
require_once 'inc/bas.inc.php';
