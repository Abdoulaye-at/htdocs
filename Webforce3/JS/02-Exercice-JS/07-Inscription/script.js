var membres = [
  {'pseudo':'Hugo',     'age':26,   'email':'wf3@hl-media.fr',      'mdp':'wf3'},
  {'pseudo':'Rodrigue', 'age':56,   'email':'rodrigue@hl-media.fr', 'mdp':'roro'},
  {'pseudo':'James',    'age':78,   'email':'james@hl-media.fr',    'mdp':'james8862'},
  {'pseudo':'Emilio',   'age':18,   'email':'milio@hl-media.fr',    'mdp':'milioDu62'}
];

// -- Déclaration de Variables
// -- EstCeQueLePseudoEstPris = faux;
var isPseudoIsUsed = false;

// -- 1 : Demander à l'utilisateur son adresse email
var pseudo = prompt("Bonjour, Quel est votre Pseudo ?","<Saisissez votre Pseudo>");

// -- 2 : Parcourir l'ensemble des données de mon tableau
for(i = 0 ; i < membres.length ; i++) {

    // -- l(BaseDeDonnees[i].email)
    if(pseudo == membres[i].pseudo) {
        // -- J'ai trouvé une adresse email qui correspond dans ma "BaseDeDonnees".
        isPseudoIsUsed = true;

        // -- 3 : Je Demande le Mot de Passe
        var mdp = prompt("Quel est votre Mot de Passe ?","<Saisissez votre Mot de Passe>");

        // -- 4 : Je vérifie que le mot de passe saisie par mon utilisateur, correspond bien avec le mot de passe associé à l'indice courant du tableau.
        if(mdp == membres[i].mdp) {
            // -- Mon MDP est correct, toutes les conditions sont remplis pour valider la connexion.
            w("Bonjour " + membres[i].prenom + " " + membres[i].nom + " !");
        } else {
            // -- Je n'ai pas pu faire correspondre les MPD
            alert("ALERTE ! ALERTE ! ALERTE !\nVotre mot de passe est incorrect.")
        }

        // -- Je profite pour arreter ma boucle
        break;

    }

} // END for

if(!isPseudoIsUsed) {
    // -- Pas d'adresse email.
    alert("ALERTE ! ALERTE ! ALERTE !\nPseudo déja pris, veuillez en choisir un autre.");
}
