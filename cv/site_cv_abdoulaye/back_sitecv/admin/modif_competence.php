<?php require'../connexion/connexion.php'; ?>
<?php
//
//mise à jour d'une competence
if(isset($_POST['competence'])){// par le name de premier input
    $competence = addslashes($_POST['competence']);
    $c_niveau = addslashes($_POST['c_niveau']);
    $id_competence =($_POST['id_competence']);
    $pdo->exec("UPDATE t_competences SET competence='$competence', c_niveau='$c_niveau' WHERE id_competence='$id_competence'");
    header('location: ../admin/competences.php');
}


// récuperer les competence
// par lid et $_GET
$id_competence = $_GET['id_competence'];
$sql = $pdo->query("SELECT * FROM t_competences WHERE id_competence = '$id_competence'");
$ligne_competence = $sql->fetch();


?>


<!DOCTYPE html>

<html lang="fr">
<head>
   <?php
    $sql = $pdo->query("SELECT * FROM t_utilisateurs");
    $ligne_utilisateur = $sql->fetch();
    
    ?>
    <meta charset="UTF-8">
    <title>modification d'une competence</title>
    <link type="text/css" rel="stylesheet" href="../css/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <h1>mon site cv <?php echo  $ligne_utilisateur['prenom']; ?></h1> 
   <?php echo $ligne_competence['competence']; ?>
   
    
</head>
<body>
<div id="wrapper">
    <div id="header">
    <h1> Admin de      <?php echo $ligne_utilisateur['pseudo'];   ?></h1>
   
    </div> <!--fin de header-->
     <?php include 'inc_menu.php'; ?> 
    <div id="menu"> Menu de site</div><!--fin de menu-->
    
    <div id="main"> 
        <?php
        
    $sql = $pdo->prepare("SELECT * FROM t_experiences");
    $sql->execute();
    $nbr_experience=$sql->rowCount();
                    
        
        ?> 
        <a href="#"><p>Ajouter une experience</p></a>
      <p><?php echo $nbr_experience; ?> </p>
       
        <h2>Modification d'une competence</h2>
        <form action="modif_competence.php" method="post">
           <input type="text" name="competence" value="<?php echo $ligne_competence['competence']; ?>">
           <input type="text" name="c_niveau" id="c_niveau" value="<?php echo $ligne_competence['c_niveau']; ?>">
         <input hidden name="id_competence" value="<?php echo $ligne_competence['id_competence']; ?>">
           <input type="submit" value="mettre à jour">
            
        </form>
       
          
        </div><!--fin de contenu principal-->
   
    <div id="footer">Le pied de page</div><!--fin de footer-->
    
    
</div> <!--fin de wrapper-->
 
</body>
</html>