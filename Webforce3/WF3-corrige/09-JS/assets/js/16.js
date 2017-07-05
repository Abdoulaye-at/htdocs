/* -------------------------------
       LA GESTION DU TEMPS
-------------------------------- */

// -- La fonction "setTimeout" me permet de spécifier une fonction à executer au bout d'une durée définie.

function Hello() {
    alert('Bonjour toi ! Que fais-tu ici ?');
}

// -- En premier, la fonction a executer
// -- Ex deuxième, la durée en millisecondes au bout de laquelle on execute la fonction.
setTimeout(Hello, 3000);

// -- La fonction "setInterval" me permet d'executer une fonction a interval régulier défini.
setInterval(Hello,3000);