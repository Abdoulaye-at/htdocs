<?php require'../connexion/connexion.php'; ?>
<?php
//
//mise à jour d'une competence
if(isset($_POST['f_titre'])){// par le name de premier input
    $f_titre = addslashes($_POST['f_titre']);
    $f_soustitre = addslashes($_POST['f_soustitre']);
    $f_dates = addslashes($_POST['f_dates']);
    $f_description = addslashes($_POST['f_description']);
    $id_formation =($_POST['id_formation']);
    $pdo->exec("UPDATE t_formations SET f_titre='$f_titre', f_soustitre='$f_soustitre', f_dates='$f_dates', f_description='$f_description' WHERE id_formation='$id_formation' ");
    header('location: ../admin/formations.php');
}


// récuperer les formation
// par l_id et $_GET
$id_formation = $_GET['id_formation'];
$sql = $pdo->query("SELECT * FROM t_formations WHERE id_formation = '$id_formation'");
$ligne_formation = $sql->fetch();


?>


<!DOCTYPE html>

<html lang="fr">
<head>
   <?php
    $sql = $pdo->query("SELECT * FROM t_utilisateurs");
    $ligne_utilisateur = $sql->fetch();
    
    ?>
    <meta charset="UTF-8">
    <title>modification d'une formation</title>
    <link type="text/css" rel="stylesheet" href="../css/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <h1>mon site cv <?php echo  $ligne_utilisateur['prenom']; ?></h1> 
   <?php echo $ligne_formation['f_titre']; ?>
   
    
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
        
    $sql = $pdo->prepare("SELECT * FROM t_formations");
    $sql->execute();
    $nbr_formation=$sql->rowCount();
                    
        
        ?> 
        <a href="#"><p>Ajouter une formation</p></a>
      <p><?php echo $nbr_formation; ?> </p>
       
        <h2>Modification d'une formation</h2>
        <form action="modif_formation.php" method="post">
           <input type="text" name="f_titre" value="<?php echo $ligne_formation['f_titre']; ?>">
           <input type="text" name="f_soustitre" id="f_soustitre" value="<?php echo $ligne_formation['f_soustitre']; ?>">
           <input type="text" name="f_description" id="f_description" value="<?php echo $ligne_formation['f_description']; ?>">
          <input hidden name="id_formation" value="<?php echo $ligne_formation['id_formation']; ?>">
           <input type="submit" value="mettre à jour">
            
        </form>
       
          
        </div><!--fin de contenu principal-->
   
    <div id="footer">Le pied de page</div><!--fin de footer-->
    
    
</div> <!--fin de wrapper-->
 
</body>
</html>