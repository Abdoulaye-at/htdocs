<?php
require_once 'inc/init.inc.php';

//--------TRAITEMENT--------//

// Déconnexion de l'internaute à sa demande //
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
  session_destroy();
}

// Internaute est déja connecté //
if(internauteEstConnecte()){
  header('location:index.php');
  exit();
}

// Traitement des données //
if($_POST){
  debug($_POST);
  if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) $contenu.='<div class="bg-danger">Le pseudo est requis</div>';
  if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) $contenu.='<div class="bg-danger">Le mot de passe est requis</div>';

  if(empty($contenu)){
    $mdp = md5($_POST['mdp']);

    $resultat = executeRequete("SELECT * FROM membres WHERE mdp = :mdp AND pseudo = :pseudo", array(':mdp' => $mdp, ':pseudo' => $_POST['pseudo']));

    if($resultat -> rowCount() != 0){
      $membre = $resultat->fetch(PDO::FETCH_ASSOC);
      $_SESSION['pseudo'] = $membre;
      // debug($_SESSION['pseudo']);

      header('location:index.php');
      exit();

    } else{
      $contenu.= '<div class="bg-danger">Identifiants incorrects</div>';
    }
  }
}

//--------AFFICHAGE--------//
require_once 'inc/haut.inc.php';
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
echo $contenu;
require_once 'inc/bas.inc.php';
