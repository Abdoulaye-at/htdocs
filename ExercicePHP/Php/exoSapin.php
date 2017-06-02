
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>exoSapin</title>
  </head>

  <body>

    <h3> Choisissez le nombre d'étages de votre sapin </h3>

    <form action="" method="get">
      <label for="Nb">Creéz votre sapin :</label>
      <input type="text" name="valeur">
    </form>

    <center>
      <?php

      // Traitement du formulaire //

      // if( isset($_GET['nb'])){
      //   $nombre = $_GET['valeur'];
      //   echo $nombre;
      // }
      // var_dump($_GET);
      if( isset($_GET['nb'])){
        $nombre = $_GET['valeur'];
      }
      $nombre = NULL;
      function sapin($parametre){
        if( !isset($parametre)){
          $parametre = 3;
        }
          // for($i=1;$i<=5;$i++){
          //     for($j=1;$j<=$i;$j++){
          //       echo "^";
          //     }
          //     echo "<p>";
          // };

          $abc = '^';
          $tronc = '|';
          // Mise en place du sapin //
            for ( $x=0; $x < $parametre; $x++) {
              for($i=0; $i < $parametre; $i++){
                  echo '<p>' . $abc . '</p>';
                  $abc .= '^';
                }
                $abc = substr($abc, 3);
            }

          // Mise en place du tronc //

          // for ($i=0; $i < 4/2; $i++){
          //   $tronc .= '|';
          // }
          // for ($i=0; $i < 4; $i++){
          //   echo '<p>' . $tronc . '</p>';
          // }

          // Reviens à faire //

          for ($i=0; $i < $parametre/2; $i++){
            if($i == 0){
              for ($j=0; $j < $parametre; $j++){
                $tronc .= '|';
              }
            }
            echo '<p>' . $tronc . '</p>';
          }
      }

      sapin($nombre);

      ?>
    </center>

  </body>
</html>
