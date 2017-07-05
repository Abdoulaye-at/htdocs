<style>
  h2 {
    margin: 0;
    font-size: 17px;
    color: red;
  }
</style>

<?php
//--------------------------------//
echo '<h2> Les balises PHP </h2>';
//--------------------------------//
?>

<strong>Bonjour</strong> <!-- En dehors des balises PHP, nous pouvons écrire du HTML. Notez que le contraire n'est pas possible. -->

<?php
  // Vous n'êtes pas obligés de fermer un passage php en fin de script
  // Notez que en PHP, toutes les instructions se terminent par un ';'



//------------------------------------------//
echo '<h2> Écritures et affichages </h2>';
//-----------------------------------------//

echo 'Bonjour';
echo '<Br>'; // On peut mettre du HTML entre les quotes qui suivent echo

print 'Nous sommes mardi'; // print a la même fonction que 'echo'

// Il existe d'autres instrucitons d'affichage que nous verrons plus loin :
// 'print_r()'
// 'var_dump()'

//commentaire sur une ligne

/*
  commentaire sur plusieurs lignes
*/

//--------------------------------------------------------------//
echo '<h2> Variable : types / déclaration / affectation </h2>';
//-------------------------------------------------------------//

// Définition : une variable est un espace mémoire nommé permettant de conserver une valeur
// On déclare une variable avec le signe '$' en PHP.

$a = 127; // je déclare la variable appelée a et lui affecte la valeur 127
echo gettype($a);

echo '<br>';

$b = 1.5;
echo gettype($b);

echo '<br>';

$a = 'une chaîne';
echo gettype ($a);

echo '<br>';

$b = '127';
echo gettype ($b);

echo '<br>';

$a = true;
echo gettype ($a);

echo '<br>';

$b = FALSE;
echo gettype ($b);


//--------------------------------//
echo '<h2> Concaténation </h2>';
//-------------------------------//

$x = 'Bonjour ';
$y = 'tout le monde';
echo $x . $y . '<br>';

$prenom1 = 'Bruno';
$prenom1 = 'Claire';
echo $prenom1 . '<br>';

$prenom2 = 'Bruno ';
$prenom2 .= 'Claire';
echo $prenom2 . '<br>';

//--------------------------------------//
echo '<h2> Guillemets et quotes </h2>';
//-------------------------------------//

$message = "aujourd'hui";
$message = 'aujourd\'hui'; // on échappe les apostrophes quand on est dans les quotes avec l'anti-slash '\'

$txt = 'bonjour';
echo '$txt tout le monde <br>'; // ici, on affiche $txt littéralement
echo "$txt tout le monde <br>"; // ici, la variable est évaluée, cc'est son contenu qui est affiché


//----------------------------//
echo '<h2> Constantes </h2>';
//---------------------------//

// Définition : une constante est un espace mémoire nommé qui contient une valeur, mais celle-ci n'est pas modifiable.

define('CAPITALE', 'Paris'); // Déclare la constante CAPITALE et lui affecte la valeur Paris. Par convention, on écrit les constantes en MAJUSCULES.

/*-------------------------
~ ~ ~ ~ EXERCICES ~ ~ ~ ~
--------------------------*/

// Afficher Bleu-Blanc-Rouge en mettant le texte de chaque couleur dans des variables
$x = 'bleu';
$y = 'blanc';
$z = 'rouge';

echo $x . '-' . $y . '-' . $z . '<br>';

//-----------------------------------------//
echo '<h2> Opérateurs arithmétiques </h2>';
//----------------------------------------//

$a = 10;
$b = 2;

echo $a + $b . '<br>';
echo $a - $b . '<br>';
echo $a / $b . '<br>';
echo $a * $b . '<br>';
echo $a % $b . '<br>'; //modulo, affiche 0 (reste de la division entière) , utile pour savoir si un nombre est pair ou impair.

//------------
$a = 10;
$b = 2;

$a += $b; // équivaut à $a = $a + $b
$a -= $b; // $a vaut 10
$a /= $b; // $a vaut 20
$a *= $b; // $a vaut 10
$a %= $b; // $a vaut 0 (10%2)

// Incrémenter et décrémenter

$i = 0;
echo $i . '<br>';

$i++;
echo $i . '<br>';

$i--;
echo $i . '<br>';

//-------------------------------------------//
echo '<h2> Structures conditionnelles </h2>';
//------------------------------------------//

$a = 10;  $b = 5;   $c = 2;

if ($a > $b) {
  print '$a est supérieur à $b <br>';
} else {
  print 'Non, c\'est $b qui est supérieur à $a <br>';
}

//--------------
if ($a > $b && $b > $c) {
  print 'OK pour au moins une des deux conditions <br>';
} else {
  print 'Nous sommes dans le else <br>';
}

//---------------

if ($a == 6 || $b > $c) {
  print 'une des deux conditions est vraie <br>';
} else {
  print 'nous sommes dans le else <br>';
}

$a = 10; $b = 5; $c = 2;

if($a == 8) {
  echo 'reponse 1 <br>';
} elseif ($a != 10) {
  echo 'reponse 2 <br>';
} else {
  echo 'reponse 3 <br>';
}


//-----------------------------------
// Forme contractée dite ternaire : 2ème possibilité d'écrire le if/else :
echo ($a == 10) ? '$a égal à 10 <br>' : '$a est différent de 10 <br>';

$resultat = ($a == 10) ? '$a égal à 10 <br>' : '$a est différent de 10 <br>';
// Le "?" remplace le "if" et le ":" remplace le "else". Si la condition avant le "?" est vraie, on exécute l'instruction avant le ":", sinon 'linstruction après le ":"

//---------------------
// Comparaison == OU ==
$vara = 1;
$varb = '1';
if ($vara == $varb) echo '$vara est égale à $varb en valeur <br>';
if ($vara === $varb) echo '$vara est égale à $varb en valeur et en type <br>';

/*
  Synthèse :
  = est un signe d'affectation
  == est un signe de comparaison en valeur
  === est un signe de comparaison en valeur ET en type (strictement égal)
*/

//------------------------
// isset et empty :

// empty() = teste si le contenu des parenthèses est vide : '', 0, NULL, false, ou non définie

// isset() = teste si c'est défini ET a une valeur non NULL

$var1 = 0;
$var2 = '';

if (empty($var1)) echo '0, vide, NULL, false est non défini <br>';
if (isset($var2)) echo '$var2 existe et est non NULL <br>';

// Différence entre empty et isset : si on ne déclare pas les variables, empty renvoie true et isset renvoie false


//-----------------------------------//
echo '<h2> Condition SWITCH </h2>';
//----------------------------------//

$couleur = 'jaune';

switch($couleur) {
  case 'bleu' : echo 'vous aimez le bleu'; break;
  case 'rouge' : echo 'vous aimez le rouge'; break;
  case 'vert' : echo 'vous aimez le vert'; break;
  default: echo "Vous n'aimez ni le rouge, ni le bleu, ni le vert <br>";
}

// Le switch compare la valeur de ce qui est entre parenthèses aux différents cases. On exécute les instructions du case dans lequel on tombe. Le break nous fait sortir de la condition.
// Si aucun des cases ne correspond, on tombe alors dans le default.

//--------- EXERCICE --------------
// Réecrire ce switch avec des conditions if/else classiques.

$couleur = 'jaune';

if ($couleur == 'bleu') {
  echo 'vous aimez le bleu';
} elseif ($couleur == 'rouge') {
  echo 'vous aimez le rouge';
} elseif ($couleur == 'vert') {
  echo 'vous aimez le vert';
} else {
  echo "Vous n'aimez ni le rouge, ni le bleu, ni le vert <br>";
}

//---------------------------------------//
echo '<h2> Fonctions prédéfinies </h2>';
//--------------------------------------//

// Définition : une fonction prédéfinie permet de réaliser un traitement spécifique prévu dans le language PHP.

//-----------
$email1 = 'prenom@site.fr';

echo strpos($email1, '@'); // nous renvoi la position 6 du caractère '@' dans la chaîne contenu dans $email1

echo '<br>';

$email2 = 'bonjour';
echo strpos($email2, '@');

var_dump(strpos($email2, '@'));
// var_dump nous permet de d'afficher la valeur 'false' retournée par le booléen quand elle ne trouve pas l'@' dans $email2.
// Il s'agit donc d'une fonction d'affichage améliorée que l'on utilise en phase de développement

// Quand on utilise une fonction prédéfinie, il faut s'interroger sur les arguments à lui donner, et sur ce qu'elle retourne :

echo '<br>';

//****

$phrase = 'mettez une phrase à cet endroit';
echo strlen($phrase); // affiche la longueur des caractères

/*
  strlen() retourne :
    succes : integer
    echec  : booleen FALSE
*/

//---------------
$texte = "Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 g";

echo substr($texte, 0, 20) . '...<a href=""> lire la suite... </a>';

/*
  strstr() retourne :
    succes : string
    echec  : booleen FALSE
*/

echo '<br>';

//--------
$email1 = 'prenom@site.fr';
echo str_replace('site', 'gmail', $email1); // on remplace le string 1 par le string 2 dans le string 3.

echo '<br>';

//-------------
$message = '   Hello World   ';
echo strtolower($message) . '<br>';
echo strtoupper($message) . '<br>';

echo strlen($message) . '<br>'; // affiche la longueur de la chaine de caractères avec espaces
echo strlen(trim($message)) . '<br>'; // affiche la longueur de la chaine de caractères sans espaces

echo '<br>';
//--------------
$message = '<h1> Hello World ! </h1> <p>How are you ?</p>';
echo strip_tags($message); // On annule les balises html

//---------------------------------------//
echo '<h2> Fonctions utilisateur </h2>';
//--------------------------------------//

// Les fonctions utilisateur ne sont pas prédéfinies dans le language PHP

// Déclaration d'une fonction
 function separation() {
   echo '<hr>';
   // fonction sans paramètres, les parenthèses sont donc vides(mais obligatoires)
   // Appel de la fonction
 }

 separation();

 //-----------------
 // Les fonctions avec des paramètres:
 // les paramètres d'une fonction sont destinés à recevoir une valeur qui permet de compléter ou de modifier le comportement de la fonction

function bonjour($qui) {
  return 'bonjour' . $qui . '<br>';
  echo 'ce code ne sera jamais executé...';
}

echo bonjour('Pierre');

$prenom = 'john';
echo bonjour($prenom);

//-----------
function appliqueTva($nombre){
  return $nombre * 1.2;
}

// Exercice : à partir de cette fonction, écrivez une fonction appliqueTva2 qui calcule un nombre multiplié par n'importe quel taux donné à la fonction.

function appliqueTva2($nombre, $taux){
  return $nombre * $taux;
}

echo appliqueTva2(100,3);
echo '<br>';

// On peut spécifier une valeur par défaut à un paramètre dans les parenthèses lors de la déclaration de la fonction. Dans ce cas, si la valeur n'est pas pasée lors de l'appel, le paramètre prend cette valeur par défaut.

//-----------------------
// Exercice :

function meteo($saison, $temperature){
  echo "Nous sommes en $saison et il fait $temperature degrés <br>";
}

meteo('hiver', 2);
meteo('printemps', 1);

// Au sein d'une nouvelle fonction exoMeteo(), afficher l'article "au" pour le printemps et "en" pour les autres saisons.

function exoMeteo($saisons, $temperature){
  $saisons == 'printemps';

  switch($saisons) {
    case 'printemps' : echo "Nous sommes au $saisons et il fait $temperature degrés <br>"; break;
    default: echo "Nous sommes en $saisons et il fait $temperature degrés <br>";
  }


  // correction version ternaire
  $article = ($saisons == 'printemps') ? 'au' : 'en';
  echo "Nous sommes $article $saisons et il fait $temperature degrés <br>";
}

exoMeteo('hiver', 10);
exoMeteo('printemps', 20);

//-----------------------------
//Variables globales et locales

function jourSemaine(){
  $jour = 'mercredi';
  return $jour; // retourne la valeur de $jour à l'exterieur de la fonction
}

echo jourSemaine() . '<br>';
//echo $jour; // une erreur s'affiche : on appelle une variable locale dans un espace global

//-----------
$pays = 'France';
function affichagePays(){
  global $pays; // 'global' nous permet d'utiliser une variable déclarée dans l'espace global à l'intérieur de la fonction.
  echo $pays;
}

affichagePays();


//------------------------------------------------//
 echo '<h2> Fonctions itératives : boucle </h2>';
//------------------------------------------------//

// Boucle while
$i =  0;
while($i < 3){
  echo "$i---";
  $i++;
}
echo '<br>';

//--------------
// Exercice :
// A l'aide d'une boucle while, afficher dans un selecteur les années de 1917 à 2017
//--------------

$annees = 1917;
echo "<select>";
while($annees <= 2017) {
  echo "<option>$annees</option>";
  $annees++;
}
echo "</select>";
echo '<br>';

// Boucle for
for($j = 0; $j <= 5; $j++) {
  print $j . '<br>';
}


//--------------
// Exercice :
// Afficher dans un selecteur les noms de 1 à 30 avec une boucle for
//--------------

echo '<select>';
for($j = 1; $j <= 30; $j++) {
  print "<option>$j </option>";
}
echo '</select>';


//--------------
// Exercice :
// Afficher les chiffres de 0 à 9 sur la même ligne dans une table html
//--------------
echo '<table border ="1">';
  echo '<tr>';
    for($j = 1; $j <= 9; $j++) {
      print "<td>$j </td>";
    }
  echo '</tr>';
echo '</table>';

echo '<br>';


// Boucle do while
// La boucle do while a la particularité de s'executer au moins une fois, puis tant que la condition est vraie

$meteo = 'beau';
do {
  echo "Je m'affiche au 1er tour de boucle";
} while ($meteo != 'beau'); // On sort de la boucle si la condition n'est pas vraie

echo '<hr>';
$i=0;
do {
  echo "Je suis au tour de boucle n° $i ! <br>";
  $i++;
} while ($i < 3);

//------------------------------------------------//
 echo '<h2> Les tableaux de données : ARRAY </h2>';
//------------------------------------------------//
// Un tableau se déclare un peu comme une variable dans laquelle on peut stocker un ensemble de valeurs. Ces valeurs peuvent être de n'importe quel type.

//Déclaration d'un array
$liste = array('gregoire', 'nathalie', 'emilie', 'francois', 'georges');

// echo $liste; // erreur : on ne peut pas afficher directement un array

// Pour afficher rapidement en phase de devp le contenbnu d'un array :
echo '<pre>';
  var_dump($liste);
echo '</pre>';

echo '<pre>';
print_r($liste);
echo '</pre>';

// Autre manière d'affecter des valeurs à un array:
$tab[] = 'France'; // Les crochets vides permettent d'ajouter la valeur indiquée au 1er indice disponible
$tab[] = 'Italie';
$tab[] = 'Suisse';
$tab[] = 'Portugal';

echo '<pre>';
print_r($tab);
echo '</pre>';

echo $tab[1]; /// affiche 'Italie'
echo '<br>';

//-------------------
// Tableau associatif
$couleur = array ('j'=>'jaune', 'b'=>'bleu', 'v'=>'vert');

// Pour accéder à n élement du tableau associatif :
echo 'La seconde couleur de notre tableau est le ' . $couleur['b'] . '<br>';
echo "La seconde couleur de notre tableau est le $couleur[b]" . '<br>'; // Un array écrit dans des guillemets perd les quotes autour de son indice

//--------
// Quelques fonctions prédefinies sur les arrays :
echo 'Taille du tableau :' . count($couleur) . '<br>'; // compte le nombre d'éléments dans le tableau
echo 'Taille du tableau :' . sizeof($couleur) . '<br>'; // 'sizeof' a la même fonction que 'count'

$chaine = implode(' -- ', $couleur); // fonction prédefinie qui rassemble les éléments d'un array en une chaîne
echo $chaine . '<br>'; // $chaine est un string contenant les valeurs de l'array

$couleur2 = explode(' -- ', $chaine); // fonction prédefinie qui transforme une chaîne contenant un séparateur comme le '-' en un array
  var_dump($couleur2);


//------------------------------------//
 echo '<h2> La boucle foreach </h2>';
//------------------------------------//
// La boucle foreach permet de parcourir un array ou un objet de manière automatique
echo '<pre>'; print_r($tab); echo '</pre>';

foreach($tab as $valeur){
  echo $valeur . '<br>';
}

// Pour parcourir les indices et les valeurs :
  foreach($tab as $indice => $valeur) { // quand il y a 2 variables, la 1ere parcourt la colonne des indices et la seconde la colonne des valeurs
    echo $indice . ' correspond à ' . $valeur . '<br>';
  }

/*--------------------
EXERCICE :
// Écrire un array avec les indices prenom, nom, email, telephone, et y associer des valeurs.
Puis vous affichez avec une boucle foreach les indices et les valeurs dans des <p>, sauf pour les prénoms qui doivent être dans un <h1>
------------------*/


$Coordonnees = array ('prenom : '    => 'Abdoulaye',
                      'nom : '       => 'Thiaw',
                      'email : '     => 'Abdoulaye.at@gmail.com',
                      'telephone : ' => '07.80.90.40.50');

foreach($Coordonnees as $indice => $valeur) { // quand il y a 2 variables, la 1ere parcourt la colonne des indices et la seconde la colonne des valeurs

  if($indice == 'prenom : ') {
    echo "<h3> $indice $valeur </h3> ";
  } else {
    echo "<p> $indice $valeur </p> ";
  }
}

//-------------------------------------------------//
 echo '<h2> Les tableaux multidimensionnels </h2>';
//-------------------------------------------------//

// Nous parlons de tableaux multidimensionnels quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.

// Création d'un tableau multidimensionnel :
$tab_multi = array(
                  0 => array ('prenom'=>'matthieu', 'nom'=> 'locheron', 'tel'=>'07.20.20.31.77'),
                  1 => array ('prenom'=>'son', 'nom'=> 'goku', 'tel'=>'01.50.26.11.88'),
                  2 => array ('prenom'=>'pierre', 'nom'=> 'dupont'),
              );

echo '<pre>'; print_r($tab_multi); echo'</pre>';

// Pour accéder à la valeur 'matthieu' :
echo $tab_multi[0]['prenom']. '<br>'; // Nous entrons dans $tab_multi à l'indice 0 pour aller ensuite à l'indice 'prenom'

// Parcourir le tableau multidimensionnel avec une boucle for :
for($i = 0; $i < count($tab_multi); $i++) {
  echo $tab_multi[$i]['prenom']. '<br>';
}

/* Exercice :
    afficher les prénoms de $tab_multi avec une boucle foreach
*/

foreach ($tab_multi as $indice => $valeur) {
  echo $valeur['prenom']. '<br>';
}


/**************************************************/
echo '<h2> Iclusion de fichiers </h2>';
//**************************************************/

echo 'Première inclusion : ';
include('exemple.inc.php'); // on précise le chemin du fichier à inclure

echo '<br> Deuxième inclusion : ';
include_once('exemple.inc.php'); // le once vérifie si le fichier à déja été inclus, et si c'est la cas, il ne fait pas l'inclusion

echo '<br> Troisième inclusion : ';
require('exemple.inc.php');

echo '<br> Quatrième inclusion : ';
require_once('exemple.inc.php');

/*
  Différence entre include et require :
  Elle apparaît uniquement si on ne parvient pas à inclure le fichier demandé :
  - include : génère une erreur de type warning, on continue l'execution du script
  - require : génère une erreur de type fatal error et stoppe l'éxecution du script

  Notez que le .inc dans le nom du fichier est là à titre indicatif précisant aux developpeurs qu'il s'agit d'un fichier d'inclusion, et non pas d'une page à part entière
*/


/**************************************/
echo '<h2> Gestion des dates </h2>';
//**************************************/

// La fonction prédéfinie date() renvoie la date du jour selon le format spécifié :
echo date('d/m/y H:i:s <br>'); // affiche la date au format JJ/MM/AAAA ainsi que heure H/M/S

echo date('y-m-d'); // affiche la date au format AA-MM-JJ. Notez que l'on peut changer les séparateurs
echo'<br>';

//------------------
/*
Définition de timestamp Unix :
Le timestamp est le nombre de secondes écoulées entre une date et le 1er janvier 1970 à 00:00:00.
cette date correspond à la création d'UNIX, premier système d'exploitation.

On utilise le timestamp dans de nombreux languages de programmation dont le PHP et le javascript
*/

// La fonction prédefinie time() retourne l'heure courante en timestamp
 echo time();
echo'<br>';

// On va utiliser le timestamp pour passer une date d'un format vers un autre format
$dateJour = strtotime('29-05-2017'); // transforme la date en timestamp

echo $dateJour . '<br>';

$dateFormat = strftime('%Y-%m-%d', $dateJour); // transforme un timestamp en date au format indiqué
echo $dateFormat . '<br>';

//---------------
// Créer une date avec la classe dateTime (approche objet) :
$date = new DateTime('11-04-2017'); // on crée un objet $date de type DateTime en utilisant le mot clé new suivi du nom de la classe DateTime. On passe une date en argument de DateTime.

echo $date->format('Y-m-d'); // on peut formater l'objet $date en appelant sa méthode format() et en lui indiquant les paramètres du format souhaité, ici Y-m-d

//-----------------------------------------//
echo '<h2> Introduction aux objets </h2>';
//----------------------------------------//
// Un objet est un autre type de données. Il permet de regrouper des informations : on peut y déclarer des variables appelées attributs ou propriétés, ainsi que des fonctions appelées méthodes.

// Exemple 1 :
// Nous créons une classe appelée Etudiant qui nous permet de créer des objets de type Etudiant. Ils auront les attributs et les méthodes de cette classe
class Etudiant {
  public $prenom = 'Julien';
  public $age = '25'; // $prenom et $age sont des attributs, public permet de préciser qu'ils seront accessibles partout.

  public function pays(){ // pays est une méthode
    return 'France';
  }
}

$objet = new Etudiant(); // new est un mot clé permettant d'instancier la classe et d'en faire un objet

echo '<pre>'; var_dump($objet); echo '</pre>';

echo $objet ->prenom . '<br>'; // pour accéder à la propriété prenom j'utilise une flèche '->';
echo $objet ->age . '<br>';
echo $objet ->pays() . '<br>'; // appel d'une méthode toujours avec les parenthèses

// Exemple 2 : un panier d'achat de site e-commerce :
class Panier {
  public function ajout_article($article){
    // ici le code pour ajouter l'article au panier
    return "L'article $article a bien été ajouté au panier";
  }
}

// Création d'un objet panier :
$panier = new Panier();
echo $panier->ajout_article('Pull'); // appelle la méthode ajout_article en lui passant l'argument 'pull' pour l'ajouter au panier.

//**********************************************************************//































///
