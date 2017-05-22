/* -- CONSIGNE : 

    I. Créer un Tableau 3D "PremierTrimestre" contenant la moyenne d'un étudiant pour plusieurs matières.

    Nous auront donc pour un étudiant, sa moyenne à plusieurs matières.
    
    Par exemple : Hugo LIEGEARD : [ Francais : 12, Math : 19, Physique 4], ... etc
    
    **** Vous allez créez au minimum 5 étudiants ****

    II. Afficher sur la page (à l'aide de document.write) pour chaque étudiant, la liste (ul et li) de sa moyenne à chaque matière, puis sa moyenne générale. 

-- */

// -- Petite fonction de raccourci (lesflemards.js)
function w(t) {
    document.write(t);
}
function l(e) {
    console.log(e);
}

// -- Création de mon Tableau 3D en JS
var PremierTrimestre = [
    {
        "nom"       : "LIEGEARD",
        "prenom"    : "Hugo",
        "moyenne"   :  {
                            "francais"  :   4,
                            "math"      :   8,
                            "physique"  :   18
                        }
    },
    {
        "nom"       : "IHADADENE",
        "prenom"    : "Karim",
        "moyenne"   : {
            "francais"  :   8,
            "math"      :   18.5,
            "physique"  :   18,
            "anglais"   :   13
        }
    },
    {
        "nom"       : "HERICOURT",
        "prenom"    : "Rudy",
        "moyenne"   : {
            "francais"  :   10.5,
            "math"      :   11,
            "physique"  :   4
        }
    },
];

// -- Aperçu dans la console
l(PremierTrimestre);

w('<ol>')
// -- Je souhaite afficher la liste de mes étudiants.
for(i = 0 ; i < PremierTrimestre.length ; i++) {

    // -- On récupère l'Objet Etudiant de l'itération
    var Etudiant = PremierTrimestre[i];
    
    // -- Aperçu dans la console.
    l(Etudiant);

    // -- Je défini mon nombre de matiere et la somme des notes à 0;
    var NombreDeMatiere = 0, SommeDesNotes = 0;

    // -- Afficher le Prénom et le Nom d'un Etudiant
    w("<li>")
        w(Etudiant.prenom + " " + Etudiant.nom);

        w("<ul>")
            for(var matiere in Etudiant.moyenne) {
                //l(Etudiant.moyenne[matiere]);
                NombreDeMatiere++;
                SommeDesNotes += Etudiant.moyenne[matiere];

                w("<li>")
                    w(matiere + " : " + Etudiant.moyenne[matiere]);
                w("</li>")
                
            } // -- Fin de la Boucle Matière

            // -- Affichage de la Moyenne
            w("<li>")
                w("<strong>Moyenne Générale :</strong> " + (Math.round(SommeDesNotes / NombreDeMatiere)));
            w("</li>")

        w("</ul>")

    w("</li>")
}
w('</ol>')