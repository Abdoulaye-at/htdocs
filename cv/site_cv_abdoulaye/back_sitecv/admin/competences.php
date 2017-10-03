<?php require'../connexion/connexion.php'; ?>
<?php
/*gestion des contenus*/
//

if(isset($_POST['competence'])){// si on recupère le premier champs du form de la competence
   if($_POST['competence']!='' && $_POST['c_niveau']!=''){
       $competence = addslashes($_POST['competence']);
       $c_niveau = addslashes($_POST['c_niveau']);
       $pdo->exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '1')");
       header("location: ../admin/competences.php");
   } 
}

// suppression des competences

    if(isset($_GET['id_competence'])){
        $efface =$_GET['id_competence']; // Get la competence
        $sql ="DELETE FROM t_competences WHERE id_competence = '$efface'"; // afface la
        $pdo->query($sql); // ou avec exec si on veut
        header('location: ../admin/competences.php'); // pour ne plus avoir l'url avec le poin d'interrogation
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
    <title>Admin competences</title>
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
        
    $sql = $pdo->prepare("SELECT * FROM t_competences");
    $sql->execute();
    $nbr_competences=$sql->rowCount();
                    
        
        ?> 
       
      <p></p>
        <table width="500" border="2">
            <tbody>
            <tr>
               <th>Compétences</th> 
               <th>Niveau</th>
              <th>Modifier</th>
              <th>Supprimer</th>
             
            </tr>
            <tr>
              <?php while ($ligne_competence = $sql->fetch())  { ?>
              <td><?php echo $ligne_competence['competence']; ?></td>
              <td><?php echo $ligne_competence['c_niveau']; ?></td>
              <td><a href="modif_competence.php?id_competence=<?php echo $ligne_competence['id_competence'];?>">MODIF</a></td>
              <td><a href="competences.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>">SUPR</a></td>
              
              
              
            </tr>
            <?php } ?>
                
               
            </tbody>
        </table>
        <h2>insertion d'une competence</h2>
        <form action="competences.php" method="post">
         <input type="text" name="competence" id="competence" placeholder="competence" required>
         <input type="text" name="c_niveau" id="c_niveau" placeholder="niveau" required>
         <input type="submit" value="Ajoute une competence">      
        </form>
          
        </div><!--fin de contenu principal-->
   
    <div id="footer">Le pied de page</div><!--fin de footer-->
    
    
</div> <!--fin de wrapper-->
 
</body>
</html>