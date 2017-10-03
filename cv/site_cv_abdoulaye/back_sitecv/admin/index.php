<?php require'../connexion/connexion.php';
session_start(); // à mettre sur toute les pages
if (isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){
    $id_utilisateur=$_SESSION['id_utilisateur'];
    $id_utilisateur=$_SESSION['prenom'];
    $id_utilisateur=$_SESSION['nom'];
}else{
    header('location:authentification.php');
}
//pour se déconnecter
if(isset($_GET['quitter'])){// on récupère le terme quitter dans l'url

	$_SESSION['connexion']='';// on vide les variables de session
	$_SESSION['id_utilisateur']='';
	$_SESSION['prenom']='';
	$_SESSION['nom']='';
		unset($_SESSION['connexion']);
		session_destroy();
	header('location:index.php');
}
?>

<!DOCTYPE html>

<html lang="fr">
<head>
   <?php
    $sql = $pdo->query("SELECT * FROM t_utilisateurs");// pensé à améliorer le code on mettant la variable id_utilisateur
    $ligne_utilisateur = $sql->fetch();

    ?>
    <meta charset="UTF-8">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <!-- <h1>mon site cv</h1>
   <?php echo  $ligne_utilisateur['prenom']; ?>
    -->
</head>
<body>
<div id="wrapper">
   <!-- <div id="header"> En tête</div>--> <!--fin de header-->
  <?php include 'inc_menu.php'; ?>
   <!DOCTYPE html>
<html lang="fr">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="jumbotron">
    <h1>my web site </h1>
      <p> <?php echo '<p>' .$ligne_utilisateur['nom'].'<br>'.$ligne_utilisateur['prenom']. '<br>'.$ligne_utilisateur['code_postal']. '</p>'?></p>
  </div>

</div>

</body>
</html>


   <footer class="container-fluid">
  <p id="foot">abdoulaye 2017 !</p>
</footer>

</div> <!--fin de wrapper-->

</body>
</html>
