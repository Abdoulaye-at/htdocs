<?php require'../connexion/connexion.php'; ?>
<?php
/*gestion des contenus*/
// insertion d'une competence

if(isset($_POST['loisir'])){// si on recupère le premier champs du form de la competence
   if($_POST['loisir']!='' ){
       $loisir = addslashes($_POST['loisir']);
     
       $pdo->exec("INSERT INTO t_loisirs VALUES (NULL, '$loisir', '1')");
       header("location: ../admin/loisirs.php");
   } 
}

// suppression des competences

    if(isset($_GET['id_loisir'])){
        $efface =$_GET['id_loisir']; // Get la competence
        $sql ="DELETE FROM t_loisirs WHERE id_loisir = '$efface'"; // afface la
        $pdo->query($sql); // ou avec exec si on veut
        header('location: ../admin/loisirs.php'); // pour ne plus avoir l'url avec le poin d'interrogation
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
    <title>Admin loisirs</title>
    <link type="text/css" rel="stylesheet" href="../css/style.css">
    <h1>mon site cv <?php echo  $ligne_utilisateur['prenom']; ?></h1> 
   
    
</head>
<body>
<div id="wrapper">
    <div id="header">
    <h1> Admin de      <?php echo $ligne_utilisateur['pseudo'];   ?></h1>
   
    </div> <!--fin de header-->
    <div id="menu"> Menu de site</div><!--fin de menu-->
    
    <div id="main"> 
        <?php
        
    $sql = $pdo->prepare("SELECT * FROM t_loisirs");
    $sql->execute();
    $nbr_loisirs=$sql->rowCount();
                    
        
        ?> 
        <a href="#"><p>Ajouter un loisir</p></a>
      <p></p>
        <table width="500" border="2">
            <tbody>
            <tr>
               <th>loisirs</th> 
              
              <th>Modifier</th>
              <th>Supprimer</th>
             
            </tr>
            <tr>
              <?php while ($ligne_loisir = $sql->fetch())  { ?>
              <td><?php echo $ligne_loisir['loisir']; ?></td>
              
              <td><a href="#">MODIF</a></td>
              <td><a href="loisirs.php?id_loisir=<?php echo $ligne_loisir['id_loisir']; ?>">SUPR</a></td>
              
              
              
            </tr>
            <?php } ?>
                
               
            </tbody>
        </table>
        <h2>insertion d'un loisir</h2>
        <form action="loisirs.php" method="post">
         <input type="text" name="loisir" id="loisir" placeholder="loisirs" required>
        
         <input type="submit" value="Ajoute une competence">      
        </form>
          
        </div><!--fin de contenu principal-->
   
    <div id="footer">Le pied de page</div><!--fin de footer-->
    
    
</div> <!--fin de wrapper-->
 
</body>
</html>