<?php require'../connexion/connexion.php'; ?>
<?php
/*gestion des contenus*/
// insertion d'une competence

if(isset($_POST['e_titre'])){// si on recupère le premier champs du form de experience
   if($_POST['e_titre']!='' ){
       /*$experience = addslashes($_POST['experience']);*/
       $e_titre = addslashes($_POST['e_titre']);
       $e_soustitre = addslashes($_POST['e_soustitre']);
       $e_description = addslashes($_POST['e_description']);
       $e_dates = addslashes($_POST['e_dates']);
     
       $pdo->exec("INSERT INTO t_experiences VALUES (NULL, '$e_titre', '$e_soustitre', '$e_description','$e_dates', '1')");
       header("location: ../admin/experiences.php");
   } 
}

// suppression des competences

    if(isset($_GET['id_experience'])){
        $efface =$_GET['id_experience']; // Get la competence
        $sql ="DELETE FROM t_experiences WHERE id_experience = '$efface'"; // esfface la
        $pdo->query($sql); // ou avec exec si on veut
        header('location: ../admin/experiences.php'); // pour ne plus avoir l'url avec le poin d'interrogation
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
    <title>Admin experiences</title>
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
    
     
    <div id="menu"> Menu de site</div><!--fin de menu-->
    
    <div id="main"> 
        <?php
        
    $sql = $pdo->prepare("SELECT * FROM t_experiences");
    $sql->execute();
    $nbr_experience=$sql->rowCount();
                    
        
        ?> 
        
    

              
              
        <table width="500" border="2">
            <tbody>
            <tr>
              <th>titre</th>
              <th>sous titre</th>
              <th>description</th>
              <th>dates</th>
              <th>Modifier</th>
              <th>Supprimer</th>
             
            </tr>
            <tr>
              <?php while ($ligne_experience = $sql->fetch())  { ?>
              <td><?php echo $ligne_experience['e_titre']; ?></td>
              <td><?php echo $ligne_experience['e_soustitre']; ?></td>
              <td><?php echo $ligne_experience['e_description']; ?></td>
              <td><?php echo $ligne_experience['e_dates']; ?></td>             
              <td><a href="modif_experience.php?id_experience=<?php echo $ligne_experience['id_experience'];?>">MODIF</a></td>
              <td><a href="experiences.php?id_experience=<?php echo $ligne_experience['id_experience']; ?>">SUPR</a></td>
              
              
              
            </tr>
            <?php } ?>
                
               
            </tbody>
        </table>
        <h2>insertion d'une experience</h2>
        <form action="experiences.php" method="post">
        <!-- <input type="text" name="experience" id="experience" placeholder="experience" required>-->
         <input type="text" name="e_titre" id="e_titre" placeholder="titre" required>
         <input type="text" name="e_soustitre" id="e_soustitre" placeholder="soustitre" required>
         <input type="text" name="e_description" id="e_description" placeholder="description" required>
         <input type="text" name="e_dates" id="e_dates" placeholder="dates" required>
        
         <input type="submit" value="Ajoute une experience">      
        </form>
          
        </div><!--fin de contenu principal-->
   
    <div id="footer">Le pied de page</div><!--fin de footer-->
    
    
</div> <!--fin de wrapper-->
 
</body>
</html>