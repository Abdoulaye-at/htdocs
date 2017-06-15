<?php
/*
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.

	3- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

*/
$contenu = '';
function montantTTC($montantHT, $periode){
  switch ($_POST['periode']) {
    case '< 5ans':  $prixTVA = 10; break;
    case '> 5ans':  $prixTVA = 20; break;
    default : return "Veuillez saisir une période valide";
  }

  $montantTravaux = $montantHT  * (1+($prixTVA / 100));
  return "Le montant de vos travaux est de $montantTravaux euros avec une TVA à $prixTVA% incluse.";

}

if(!empty($_POST)) {
  echo "<pre>"; echo var_dump($_POST); echo "</pre>";
  $contenu .= montantTTC($_POST['montantHT'], $_POST['periode']);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    <h1>Votre devis de travaux</h1>

    <form action="" method="post">
      <div class="">
        <label for="montant">montantHT</label>
        <input type="text" name="montantHT">
      </div>

      <div class="">
        <label for="">Plus de 5 ans</label>
        <input type="radio" name="periode" value="> 5ans">
      </div>

      <div class="">
        <label for="">5 ans ou moins</label>
        <input type="radio" name="periode" value="< 5ans">
      </div>

      <input type="submit" name="envoyer" value="Valider">
    </form>
    <?php echo $contenu; ?>
  </body>
</html>
