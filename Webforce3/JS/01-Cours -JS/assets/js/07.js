// LES CONDITIONS //
var Major = 18;

if (Major >= 18) {
    alert("Bien le bonjour ! ");
} else {
  alert("Google...");
}

/*--------------------------------------------
~ ~ ~ ~ LES OPÉRATEURS DE COMPARAISONS ~ ~ ~ ~
---------------------------------------------*/
//-- L'Opérateur de comparaison "==" signifie que : ÉGAL A ... Il permet de vérifier que deux valeurs sont identiques.

//-- L'Opérateur de comparaison "===" signifie : STRICTEMENT ÉGAL à ... Il va comparer la valeur et aussi le type de donnée.

//-- L'Opérateur de comparaison "!=" signifie : DIFFÉRENT de

//-- L'Opérateur de comparaison "!==" signifie : STRICTEMENT différent de


/*--------------------------------------------
~ ~ ~ ~ LES OPÉRATEURS DE COMPARAISONS ~ ~ ~ ~
---------------------------------------------*/
////////////---------- L'opérateur ET : && (ou AND) -----------////////////

// Si la combinaison emailLogin et email correspond ET la combinaison mdpLogin et mdp correspond.
// Dans cette condition, les deux doivent obligatoirement correspondre pour être validée.

if ((emailLogin === email) && (mdpLogin === mdp) ) {...}


////////////-------- L'opérateur OU : || (ou OR)  ----------////////////

// Si la combinaison emailLogin ou email correspond ET la combinaison mdpLogin ou mdp correspond.
// Ici, au moins une des deux possibilités doit correspondre pour être validée.

if ((emailLogin === email) || (mdpLogin === mdp) ) {...}

////// -- L'opérateur "!" : qui signifie contraire de, ou encore not //////

var isUserApproved = true;
if (!isUserApproved) { // Si l'utilisateur n'est pas approuvé.

}

// -- Reviens à écrire :
if(isUserApproved == false) {};
