<?php require'../connexion/connexion.php'; ?>
<?php
/*gestion des contenus*/
// insertion d'une competence

if(isset($_POST['f_titre'])){// si on recupère le premier champs du form de experience
   if($_POST['f_titre']!='' ){
       /*$experience = addslashes($_POST['experience']);*/
       $f_titre = addslashes($_POST['f_titre']);
       $f_soustitre = addslashes($_POST['f_soustitre']);
       $f_description = addslashes($_POST['f_description']);
       $f_dates = addslashes($_POST['f_dates']);
     
       $pdo->exec("INSERT INTO t_formations VALUES (NULL, '$f_titre', '$f_soustitre', '$f_description','$f_dates', '1')");
       header("location: ../admin/formations.php");
   } 
}

// suppression des competences

    if(isset($_GET['id_formation'])){
        $efface =$_GET['id_formation']; // Get la competence
        $sql ="DELETE FROM t_formations WHERE id_formation = '$efface'"; // efface la
        $pdo->query($sql); // ou avec exec si on veut
        header('location: ../admin/formations.php'); // pour ne plus avoir l'url avec le poin d'interrogation
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
    <title>Admin formation</title>
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
        
    $sql = $pdo->prepare("SELECT * FROM t_formations");
    $sql->execute();
    $nbr_formation=$sql->rowCount();
                    
        
        ?> 
        <a href="#"><p>Ajouter une formation</p></a>
      <p><?php echo $nbr_formation; ?> </p>
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
              <?php while ($ligne_formation = $sql->fetch())  { ?>
              <td><?php echo $ligne_formation['f_titre']; ?></td>
              <td><?php echo $ligne_formation['f_soustitre']; ?></td>
              <td><?php echo $ligne_formation['f_description']; ?></td>
              <td><?php echo $ligne_formation['f_dates']; ?></td>             
              <td><a href="modif_formation.php?id_formation=<?php echo $ligne_formation['id_formation'];?>">MODIF</a></td>
              <td><a href="formations.php?id_formation=<?php echo $ligne_formation['id_formation']; ?>">SUPR</a></td>
            </tr>
            <?php } ?>
              
              
              
                
               
            </tbody>
        </table>
        <h2>insertion d'une formation</h2>
        <form action="formations.php" method="post">
        <!-- <input type="text" name="experience" id="experience" placeholder="experience" required>-->
         <input type="text" name="f_titre" id="f_titre" placeholder="titre" required>
         <input type="text" name="f_soustitre" id="f_soustitre" placeholder="soustitre" required>
         <input type="text" name="f_description" id="f_description" placeholder="description" required>
         <input type="text" name="f_dates" id="f_dates" placeholder="dates" required>
        
         <input type="submit" value="Ajoute une formation">      
        </form>
          
        </div><!--fin de contenu principal-->
   
    <div id="footer">Le pied de page</div><!--fin de footer-->
    
    
</div> <!--fin de wrapper-->
 
</body>
</html>