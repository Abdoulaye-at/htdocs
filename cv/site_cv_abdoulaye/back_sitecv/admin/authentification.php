<?php require'../connexion/connexion.php'; ?>
<?php
session_start(); // à mettre sur toute les pages
$msg_authentification_erreur='';

if(isset($_POST['connexion'])){// on envoie lr form avec le name du bouton (on a cliqué sur le bouton)
    $email= addslashes($_POST['email']);
    $mdp = addslashes($_POST['mdp']);
    $sql = $pdo->prepare("SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp' "); // on verifie l'email et le mdp
    $sql->execute();
    $nbr_utilisateur = $sql->rowCount(); //on compte s'il est ds la bdd
    if($nbr_utilisateur==0){// il n'y est pas
        $msg_authentification_erreur="vous n'êtes pas inscrit";

    }else{
        $ligne_utilisateur = $sql->fetch(); // va chercher les infos

        $_SESSION['connexion']='connecté';
        $_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
        $_SESSION['prenom']=$ligne_utilisateur['prenom'];
        $_SESSION['nom']=$ligne_utilisateur['nom'];
        header('location: index.php');

    }
} // ferme le if isset
?>

<!DOCTYPE html>

<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>Authentification</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


</head>
<body>


        <!-- <a href="#"><p>se connecter </p></a> -->

        <!--
        <div class="container">
	<section id="content">
		<form action="">
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Nom" required="" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />

			</div>
		</form>-->


    <form action="authentification.php" method="post">
        <input type="email" name="email" placeholder="votre email" required>
        <br>
        <input type="password" name="mdp" placeholder="votre mot de passe" required>
        <input type="submit" name="connexion" value="se connecter" >

    </form>




</body>
</html>
