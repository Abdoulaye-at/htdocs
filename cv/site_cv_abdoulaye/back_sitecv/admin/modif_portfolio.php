<?php require'../connexion/connexion.php'; ?>
<?php
//
//mise à jour d'une competence
if(isset($_POST['p_titre'])){// par le name de premier input
    $p_titre = addslashes($_POST['p_titre']);
    $p_img = addslashes($_POST['p_img']);
    $id_portfolio =($_POST['id_portfolio']);
    $pdo->exec("UPDATE t_portfolio SET p_titre='$competence', p_img='$p_img' WHERE id_portfolio='$id_portfolio'");
    header('location: ../admin/portfolio.php');
}


// récuperer les competence
// par lid et $_GET
$id_competence = $_GET['id_portfolio'];
$sql = $pdo->query("SELECT * FROM t_portfolio WHERE id_portfolio = '$id_portfolio'");
$ligne_portfolio = $sql->fetch();


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
        <form action="modif_portfolio.php" method="post">
           <input type="text" name="portfolio" value="<?php echo $ligne_portfolio['p_titre']; ?>">
           <input type="text" name="p_img" id="p_img" value="<?php echo $ligne_portfolio['p_img']; ?>">
         <input hidden name="id_portfolio" value="<?php echo $ligne_competence['id_portfolio']; ?>">
           <input type="submit" value="mettre à jour">
            
        </form>
       
          
        </div><!--fin de contenu principal-->
   
    <div id="footer">modification de mon portfolio</div><!--fin de footer-->
    
    
</div> <!--fin de wrapper-->
 
</body>
</html>