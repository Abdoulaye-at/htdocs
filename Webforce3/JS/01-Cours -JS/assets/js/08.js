/*---------------------------------
 ~ ~ ~ ~ ~ LES BOUCLES ~ ~ ~ ~ ~ ~
----------------------------------*/
// La boucle FOR //

for(var i = 1; i <= 10; i++) {
  document.write("<p> Instruction executée : <strong>" + i + "</strong> </p>" )
}

// Subtilité //
var i = 40;
i++ // Affiche 40
++i // Affiche 41

document.write("<hr>")
// La boucle WHILE : tant que //
var j = 1;
while (j<=10) {
  document.write("<p> Instruction executée : <strong>" + j + "</strong> </p>" )
  j++;
}
