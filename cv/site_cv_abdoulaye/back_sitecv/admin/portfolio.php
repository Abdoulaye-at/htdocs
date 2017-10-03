<?php require'../connexion/connexion.php'; ?>
<?php
/*gestion des contenus*/
//

if(isset($_POST['p_titre'])){// si on recupère le premier champs du form de la competence
   if($_POST['p_titre']!='' && $_POST['p_img']!=''){
       $portfolio = addslashes($_POST['p_titre']);
       $p_img = addslashes($_POST['p_img']);
       $pdo->exec("INSERT INTO t_portfolio VALUES (NULL, '$portfolio', '$p_titre', '1')");
       header("location: ../admin/portfolio.php");
   } 
}

// suppression des competences

    if(isset($_GET['id_portfolio'])){
        $efface =$_GET['id_portfolio']; // Get la competence
        $sql ="DELETE FROM t_portfolio WHERE id_portfolio = '$efface'"; // afface la
        $pdo->query($sql); // ou avec exec si on veut
        header('location: ../admin/portfolio.php'); // pour ne plus avoir l'url avec le poin d'interrogation
    }
?>


<!DOCTYPE html>

<html lang="fr">
<head>
   <?php
    $sql = $pdo->query("SELECT * FROM t_utilisateurs");
    $ligne_utilisateur = $sql->fetch();
    
    ?>
    <meta charset="UTF-8">
    <title>Admin portfolio</title>
    <link type="text/css" rel="stylesheet" href="../css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <h1>mon site cv <?php echo  $ligne_utilisateur['prenom']; ?></h1> 
   
    
</head>
<body>
<div id="wrapper">
    <div id="header">
    <h1> Admin de      <?php echo $ligne_utilisateur['pseudo'];   ?></h1>
   
    </div> <!--fin de header-->
  <?php include 'inc_menu.php'; ?> 
    
  
    
    <div id="main"> 
        <?php
        
    $sql = $pdo->prepare("SELECT * FROM t_portfolio");
    $sql->execute();
    $nbr_portfolio=$sql->rowCount();
                    
        
        ?> 
       
      <p></p>
        <table width="500" border="2">
            <tbody>
            <tr>
               <th>titres</th> 
               <th>image</th>
              <th>Modifier</th>
              <th>Supprimer</th>
             
            </tr>
            <tr>
              <?php while ($ligne_portfolio = $sql->fetch())  { ?>
              <td><?php echo $ligne_portfolio['portfolio']; ?></td>
              <td><?php echo $ligne_portfolio['p_img']; ?></td>
              <td><a href="modif_portfolio.php?id_portfolio=<?php echo $ligne_portfolio['id_portfolio'];?>">MODIF</a></td>
              <td><a href="portfolio.php?id_portfolio=<?php echo $ligne_portfolio['id_portfolio']; ?>">SUPR</a></td>
              
              
              
            </tr>
            <?php } ?>
                
               
            </tbody>
        </table>
        <h2>insertion de mes réalisations</h2>
        <form action="portfolio.php" method="post">
         <input type="text" name="p_titre" id="p_titre" >
         <input type="image" name="p_img" id="p_img" required>
         <input type="submit" value="Ajoute une réalisation">      
        </form>
          
        </div><!--fin de contenu principal-->
   
  
    
    
</div> <!--fin de wrapper-->
 
</body>
</html>