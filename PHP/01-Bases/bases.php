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

// Définition : une fonction prédééfinie  premet de réaliser un traitement spécifique prévu dans le language PHP.

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

$phrase = 'mettez une phrase ici à cet endroit';
echo strlen($phrase); // affiche la longueur des caractères

/*
  strlen() retourne :
    succes : integrer
    echec  : booleen FALSE
*/

//---------------
$texte = "lorem ipsumLorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 g";

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
echo strlen(trim($message)) . '<br>'; // affiche la longueur de la chaine de caractères sans avec espaces

echo '<br>';
//--------------
$message = '<h1> Hello World ! </h1> <p>How are you ?</p>';
echo strip_tags($message);

//---------------------------------------//
echo '<h2> Fonctions utilisateur </h2>';
//--------------------------------------//

// Les fonctions utilisateur ne sont pas définies dans le language

// Déclaration d'une fonction
 function separation() {
   echo '<hr>';
   // fonction sans paramètres, les parenthèses sont donc vides(mais obligatoires)
   // Appel de la fonction
 }

 separation();

 //-----------------
 // Les fonctions avec des paramètres:
 // les paramètres d'une fonction sont destinés à recevoir une valeur qui permet de compléter ou de mofifier le comporteent de la fonction

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













///
