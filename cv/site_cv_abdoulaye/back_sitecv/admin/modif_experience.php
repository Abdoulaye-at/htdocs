<?php require'../connexion/connexion.php'; ?>
<?php
//
//mise à jour d'une competence
if(isset($_POST['e_titre'])){// par le name de premier input
    $e_titre = addslashes($_POST['e_titre']);
    $e_soustitre = addslashes($_POST['e_soustitre']);
    $e_dates = addslashes($_POST['e_dates']);
    $e_description = addslashes($_POST['e_description']);
    $id_experience =($_POST['id_experience']);
    $pdo->exec("UPDATE t_experiences SET e_titre='$e_titre', e_soustitre='$e_soustitre', e_dates='$e_dates', e_description='$e_description' WHERE id_experience='$id_experience' ");
    header('location: ../admin/formations.php');
}


// récuperer les formation
// par l_id et $_GET
$id_experience = $_GET['id_experience'];
$sql = $pdo->query("SELECT * FROM t_experiences WHERE id_experience = '$id_experience'");
$ligne_experience = $sql->fetch();


?>


<!DOCTYPE html>

<html lang="fr">
<head>
   <?php
    $sql = $pdo->query("SELECT * FROM t_utilisateurs");
    $ligne_utilisateur = $sql->fetch();
    
    ?>
    <meta charset="UTF-8">
    <title>modification d'une experience</title>
    <link type="text/css" rel="stylesheet" href="../css/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <h1>mon site cv <?php echo  $ligne_utilisateur['prenom']; ?></h1> 
   <?php echo $ligne_experience['e_titre']; ?>
   
    
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
       
        <h2>Modification d'une formation</h2>
        <form action="modif_experience.php" method="post">
           <input type="text" name="e_titre" value="<?php echo $ligne_experience['e_titre']; ?>">
           <input type="text" name="e_soustitre" id="e_soustitre" value="<?php echo $ligne_experience['f_soustitre'];?>">
           <input type="text" name="e_description" id="e_description" value="<?php echo $ligne_experience['e_description']; ?>">
          <input hidden name="id_experience" value="<?php echo $ligne_experience['id_experience'];?>">
           <input type="submit" value="mettre à jour">
            
        </form>
       
          
        </div><!--fin de contenu principal-->
   
    <div id="footer">Le pied de page</div><!--fin de footer-->
    
    
</div> <!--fin de wrapper-->
 
</body>
</html>