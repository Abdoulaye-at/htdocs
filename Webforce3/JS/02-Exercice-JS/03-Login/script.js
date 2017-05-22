// BASE DE DONNÉES //
var email, mdp;

email = "abdoulaye.at@gmail.com";
mdp = "motdepasse";


var emailLogin = prompt("Bonjour, quel est votre email ?", "Saisissez votre Email");

  if (email === emailLogin) {
    var mdpLogin = prompt("Saisissez votre mot de passe");

    if (mdpLogin === mdp){
      alert("Bienvenue Utilisateur")
    } else {
      alert("ATTENTION, nous n'avons pas reconnu votre mot de passe");
    }
  }  else {
      alert("adresse mail incompatible");
}
